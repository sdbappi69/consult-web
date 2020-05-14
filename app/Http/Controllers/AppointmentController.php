<?php

namespace App\Http\Controllers;
use App\Appointment;
use App\AppointmentDocument;
use App\AppointmentLog;
use App\Category;
use App\Slot;
use App\User;
use Validator;
use DB;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'medium' => ['required','exists:mediums,id'],
            'additional_data' => 'required',
        ],[
            'medium' => 'You need to select a consult medium',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $additional_info = json_decode($request->additional_data);
        $slot = Slot::with('getCategoryDetail')->findOrfail($additional_info->slot_id);
        $provider = User::findOrfail($additional_info->provider_id);
        $category = Category::findOrfail($additional_info->category_id);
        $available_slot = json_decode($slot->attributes)->available_slots ?? [];
        $booked_slot = json_decode($slot->attributes)->booked_slots ?? [];
        if(!count($available_slot)){
            session()->flash('error','Invalid data provided');
            return back();
        }
        $valid_slot = false;
        foreach($available_slot as $struct) {
            if ($struct->start == $additional_info->start && $struct->end == $additional_info->end) {
                $valid_slot = true;
                break;
            }
        }
        foreach($booked_slot as $struct) {
            if ($struct->start == $additional_info->start && $struct->end == $additional_info->end) {
                $valid_slot = false;
                break;
            }
        }
        if(!$valid_slot){
            session()->flash('error','Invalid data provided');
            return back();
        }
        try{
            DB::beginTransaction();
            $service_charge = json_decode($slot->getCategoryDetail->attributes)->service_charge_per_slot ?? 0;
            $appointment = Appointment::create([
                'provider_id' =>$additional_info->provider_id,
                'category_id' =>$additional_info->category_id,
                'client_id' => auth()->user()->id,
                'medium_id' =>$request->medium,
                'fee' =>$additional_info->fee,
                'start' =>$additional_info->start,
                'end' =>$additional_info->end,
                'date' =>$slot->date,
                'status' => 1,
                'payment_status' => 1,
                'slot_id' => $slot->id,
                'service_charge' => $service_charge,
                'total' => $additional_info->fee - $service_charge,
                'created_by' => auth()->user()->id,
            ]);
            $book_time = [
                'start' =>$additional_info->start,
                'end' =>$additional_info->end,
            ];
            $slot_attribute = json_decode($slot->attributes);
            $slot_attribute->history = json_encode($slot_attribute);
            array_push($slot_attribute->booked_slots,$book_time);
            $slot->update([
                'attributes' => json_encode($slot_attribute)
            ]);
            $files = [];
            if (isset($request->file) && count($request->file)) {
                foreach ($request->file as $file_data){
                    $file_name = $this->fileUpload($file_data);
                    array_push($files,$file_name);
                }
            }
            AppointmentDocument::create([
                'appointment_id' => $appointment->id,
                'documents' => json_encode($files),
                'created_by' => auth()->user()->id
            ]);
            DB::commit();
            session()->flash('success','Appointment has been booked');
            return back();
        }catch (\Exception $e){
            DB::rollback();
            session()->flash('error','Invalid data provided');
            return back();
        }
    }

    public function updateTimeLog(Request $request, $id){
        $appointment = Appointment::findOrFail($id);
        try{
            DB::beginTransaction();
            if($request->provider_start == 1){
                $appointment->update([
                    'status' => 3
                ]);
            }
            if($request->provider_end == 1){
                if($appointment->status == 3){
                    $appointment->update([
                        'status' => 5
                    ]);
                }else{
                    $appointment->update([
                        'status' => 7
                    ]);
                    return 'Doctor still not active.If your schedule time over then leave this conversation administration will investigate this appointment.';
                }
            }
            AppointmentLog::create([
                'appointment_id' => $id,
                'user_id' => auth()->user()->id,
                'time' => date('Y-m-d H:i:s')
            ]);
            DB::commit();
            return 'success';
        }catch(\Exception $e){
            DB::rollback();
            return 'fail';
        }
    }

    public function getTimeLog(Request $request, $id){
        $html = '';
        foreach (AppointmentLog::where('appointment_id',$id)->get() as $log){
            $html .= '<tr>
                        <td>'.$log->user->name.'</td> 
                        <td>'.date('Y-m-d h:i:s A',strtotime($log->time)).'</td> 
                     </tr>';
        }
        return $html;
    }

    private function fileUpload($query){
        $image_name = time() . rand(11111, 99999);
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = '../../consult/public/uploads/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path.$image_full_name;
        $success = $query->move($upload_path,$image_full_name);
        return $image_full_name; // Just return image
    }
}
