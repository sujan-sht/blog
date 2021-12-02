<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class FrontendSettingsController extends Controller
{
    public function index(){
        $setting=Setting::first();
        
        return view('admin.settings.index',compact('setting'));
    }

    public function create()
    {
        
        return view ('admin.settings.create');

    }

    public function store(Request $request)
    {
        
        $data = $request->all();
        $this->validateData($request);
        
        
        $post =new Setting();
        $post->name=$data['name'];
        $post->address=$data['address'];
        $post->contact=$data['contact'];
        $post->email=$data['email'];
        $post->facebook=$data['facebook'];
        $post->twitter=$data['twitter'];
        $post->whatsapp=$data['whatsapp'];
        $post->linkedin=$data['linkedin'];
        $post->footer=$data['footer'];

        if ($image = $request->file('image')) {
            $destinationPath = 'logo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $post['image'] = "$profileImage";
        }

        $post->save();
        return redirect('/settings')->with('status','Setting has been created successfully');
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit',compact('setting'));
        
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->validateData($request);
        
        $post =Setting::findOrFail($id);
        $post->name=$data['name'];
        $post->address=$data['address'];
        $post->contact=$data['contact'];
        $post->email=$data['email'];
        $post->facebook=$data['facebook'];
        $post->twitter=$data['twitter'];
        $post->whatsapp=$data['whatsapp'];
        $post->linkedin=$data['linkedin'];
        $post->footer=$data['footer'];
        if ($image = $request->file('image')) {
            $image_path = public_path('logo/' . $post->image);
            
            if(file_exists($image_path)){
                unlink($image_path);
                $destinationPath = 'logo/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $post['image'] = "$profileImage";
            }
        }else{
            unset($post['image']);
        }

        $post->update();
        return redirect('/settings')->with('status','Settings has been updated successfully');

    }

    // Validate Data
    protected function validateData(Request $request)
    {
        
        return $request->validate([
            'name'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'email'=>'required|email'
            
        ]);
    }
}
