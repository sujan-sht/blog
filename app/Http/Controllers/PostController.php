<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use File;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->where('user_id',Auth::user()->id)->latest()->paginate(5);
        
        return view('admin.post.index',compact('posts'))->with('count',1);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id',0)->where('status',1)->get();
        $categories_dropdown = "<option value='' selected disabled> Select Category Level </option>";
        foreach ($categories as $cat){
            $categories_dropdown .= "<option value='". $cat->id ."-" . $cat->parent_id ." '> ".$cat->category_name."</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->where('status', 1)->get();
            foreach ($sub_categories as $sub_cat){
                $categories_dropdown .= "<option value='". $sub_cat->id ."-" . $sub_cat->parent_id ."'> &nbsp; &nbsp; --- ". $sub_cat->category_name."  </option>";
            }

        }

        return view('admin.post.create',compact('categories_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req=$request->all();
        $data = $this->validateData($request);
        
        $post =new Post();
        $post->title=$req['title'];
        $post->user_id=Auth::user()->id;
        $post->category_id=$req['category_id'];
        $post->description=$req['editor1'];
        $post->status=$req['status'];
        $post->view_count=0;

        $post->slug = Str::slug($req['title']);
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $post['image'] = "$profileImage";
        }
        // dd($post);
        $post->save();
        return redirect('/blog')->with('status','Post has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.show',compact('post'))->with('user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        $categories = Category::where('parent_id',0)->where('status',1)->get();
        $categories_dropdown = "<option value='' selected disabled> Select Category Level </option>";
        foreach ($categories as $cat){
            if($cat->id == $post->category_id){
                $selected = "selected";
            } else {
                $selected = "";
            }
            $categories_dropdown .= "<option value='". $cat->id ."-" . $cat->parent_id . "' ". $selected ."> ".$cat->category_name."</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->where('status', 1)->get();
            foreach ($sub_categories as $sub_cat){
                if($sub_cat->id == $post->category_id){
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                $categories_dropdown .= "<option value='". $sub_cat->id ."-". $sub_cat->parent_id ."' ". $selected ."> &nbsp; &nbsp; --- ". $sub_cat->category_name."  </option>";
            }

        }


        // return view('admin.post.create',compact('categories_dropdown'));
        return view('admin.post.edit',compact('categories_dropdown','post'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validateData($request);
        
        $post =Post::findOrFail($id);
        $post->title=$request->input('title');
        $post->user_id=Auth::user()->id;
        $post->category_id=$request->input('category_id');
        $post->description=$request->input('editor1');
        $post->status=$request->input('status');
        $post->slug = $request->input(Str::slug('title'));
        

        if ($image = $request->file('image')) {
            $image_path = public_path('image/' . $post->image);
            
            if(file_exists($image_path)){
                unlink($image_path);
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $post['image'] = "$profileImage";
            }
        }else{
            unset($post['image']);
        }

        $post->update();
        return redirect('/blog')->with('status','Post has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $image_path = public_path('image/' . $post->image);
        
        if(file_exists($image_path)){
            unlink($image_path);
        }

        $post->delete();
        return redirect('/blog')->with('status','Post has been deleted successfully');
    }
    

    // Validate Data
    protected function validateData(Request $request)
    {
        // $id = $post->id ?? '';
        // $validate_image = in_array($request->method(), ['PUT', 'PATCH']) ? 'sometimes' : 'sometimes|file|image|max:3000';
        return $request->validate([
            'title'=>'required',
            'editor1'=>'required',
            'image' => 'required',
            'status'=> 'required'
        ]);
    }
}
