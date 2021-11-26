<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserProfileController extends Controller
{   
    // public function index(){
        
    //     $user = Auth::user();
        
    //     return view('admin.profile.profile');
    // }

    //edit
    public function edit(){
        
        return view('admin.profile.edit');
    }

    //update
    public function update(Request $request){
        // dd('hi');
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'current_password'=>'required',
            'password'=>'required|same:confirm_password|min:6',
            'confirm_password'=>'required'
        ]);
                
        $user=Auth::user();
        $userPassword=$user->password;

        if(!Hash::check($request->current_password,$userPassword)){
            return redirect('/profile/edit')->with('error','Current password doesnot match');
        }
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->about=$request->input('about');
        if ($image = $request->file('image')) {
            $image_path = public_path('image/profileImage/' . $user->image);
        
            if(file_exists($image_path)){
                unlink($image_path);
                $destinationPath = 'image/profileImage/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $user['image'] = "$profileImage";
            }
        }else{
            unset($user['image']);
        }
        
        
        $user->update();

        return redirect('/profile')->with('status','Profile has been updated successfully');
    }
}
