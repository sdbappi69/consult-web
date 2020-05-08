<?php

namespace App\Http\Controllers;
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

}
