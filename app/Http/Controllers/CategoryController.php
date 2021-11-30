<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Str;
use DB;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
               
        return view('admin.category.index',compact('categories'))->with('count',1);
    }
    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view ('admin.category.create', compact('categories'));

    }
    public function store(Request $request)
    {
        $data = $request->all();
        
        $this->validateData($request);
        
        $post =new Category();
        $post->category_name=$data['category_name'];
        $post->slug = Str::slug($data['category_name']);
        $post->parent_id=$data['parent_id'];
        $post->status=$data['status'];
        

        $post->save();
        return redirect('/category')->with('status','Category has been created successfully');
    }

    public function edit($id)
    {
        $myCategory = Category::findOrFail($id);
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.category.edit',compact('categories','myCategory'));
        
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->validateData($request);
        
        $post =Category::findOrFail($id);
        $post->category_name=$data['category_name'];
        $post->slug = Str::slug($data['category_name']);
        $post->parent_id=$data['parent_id'];
        $post->status=$data['status'];
        $post->update();
        return redirect('/category')->with('status','Category has been updated successfully');

    }

    public function destroy($id)
    {
        $post = Category::findOrFail($id);
        $post->delete();
        DB::table('categories')->where('parent_id',$id)->delete();
        return redirect('/category')->with('status','Category has been deleted successfully');
    }

    // Validate Data
    protected function validateData(Request $request)
    {
        
        return $request->validate([
            'category_name'=>'required',
            
        ]);
    }
}
