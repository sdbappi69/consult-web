<?php

namespace App\Http\Controllers;
use App\Appointment;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request){

    }

    public function profileUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required_with:new_password',
            'new_password' => 'min:8',
            'confirm_password' => 'min:8|same:new_password',
        ]);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();
        $user = auth()->user();
        if ($request->filled('new_password')) {
            if(Hash::check($request->old_password, $user->password)){
                $user->update([
                    'password' => $request->new_password
                ]);
                session()->flash('success','Password updated.');
                return back();
            } else{
                session()->flash('error', 'Invalid old password.');
                return back();
            }
        }
        else{
            $old_attribute = json_decode($user->attributes);
            $attribute = clone $old_attribute;
            if (isset($request->image) && $request->file('image')) {
                $file = $request->file('image');
                $image = time() . rand(1111, 9999) . '.' . $file->getClientOriginalExtension();
                $img_upload_path = config('app.upload_path');
                $file->move($img_upload_path, $image);
                $attribute->image_url = $image;
                $attribute->history = json_encode($old_attribute);
                $user->update([
                    'attributes' => json_encode($attribute)
                ]);
                session()->flash('success','Profile Picture updated.');
                return back();
            }else{
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'mobile' => $request->mobile
                ]);
                session()->flash('success','Profile updated.');
                return back();
            }
        }
    }

    public function history(Request $request){
        $req = $request->all();
        $appointment = Appointment::with('provider','category','client','medium')->where('client_id',auth()->user()->id)->paginate(10);
        return view('user.history',compact('appointment','req'));
    }

    public function historyView(Request $request, $id){
        $appointment = Appointment::findOrFail($id);
        $to = Carbon::createFromFormat('h:i A', $appointment->start);
        $from = Carbon::createFromFormat('h:i A', $appointment->end)->addMinute(10);
        $diff_in_minutes = $to->diffInSeconds($from);
        $cmd = shell_exec('node generateToken --key=4d8dc97794474e66a9a483f1d30251ba --appID=806a43.vidyo.io --userName='.explode(' ',auth()->user()->name)[0].' --expiresInSecs='.$diff_in_minutes);
        $execute_data = preg_split('/\r\n|\r|\n/',$cmd);
        $call_token = null;
        $room_name = substr($appointment->provider->email,0,5).'_'.$appointment->id.'_'.substr($appointment->client->email,0,5);
        if(isset($execute_data[8])){
            $call_token = $execute_data[8];
        }
        return view('user.historyView',compact('appointment','call_token','room_name'));
    }
}
