<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navbar;

class NavbarController extends Controller
{
    //
    public function index(){
        
        $menus = Navbar::orderBy('order')->get();
        return view('admin.navbar.index',compact('menus'))->with('count',1);
    }

    public function create(){
        return view('admin.navbar.create');
    }

    public function store(Request $request)
    {
        
        $data = $request->all();
        $this->validateData($request);
        
        
        $post =new Navbar();
        $post->name=$data['name'];
        $post->url=$data['url'];
        $post->order=$data['order'];
        $post->save();
        return redirect('/navbar')->with('status','Menu has been added successfully');
    }

    public function edit($id)
    {
        $myMenu = Navbar::findOrFail($id);
        return view('admin.navbar.edit',compact('myMenu'));
        
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->validateData($request);
        
        $post =Navbar::findOrFail($id);
        $post->name=$data['name'];
        $post->url=$data['url'];
        $post->order=$data['order'];
        $post->update();
        return redirect('/navbar')->with('status','Menu has been updated successfully');

    }

    public function destroy($id)
    {
        $post = Navbar::findOrFail($id);
        $post->delete();
        return redirect('/navbar')->with('status','Menu has been deleted successfully');
    }
    

    // Validate Data
    protected function validateData(Request $request)
    {
        
        return $request->validate([
            'name'=>'required',
            'url'=>'required',
            
        ]);
    }
}
