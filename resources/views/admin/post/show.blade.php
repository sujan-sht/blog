@extends('admin.includes.master')
@section('title')Show Post -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Post</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Post</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="{{route('admin.post.edit',$post->id)}}" class="btn add-btn" ><i class="fa fa-pencil"></i> Edit Post</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @include('admin.includes.message')
                                    <div class="row ">
                                        <img src="{{asset('/image/'.$post->image)}}" alt="" class="img-fluid" width="200px" />
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Blog Title</label>
                                        <div class="col-md-10">
                                             {{$post->title}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Category</label>
                                        <div class="col-md-10">
                                             {{$post->category->category_name}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Description</label>
                                        <div class="col-md-10">
                                             {!! $post->description !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Status</label>
                                        <div class="col-md-10">
                                             {{$post->status}}
                                        </div>
                                    </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            
            
            </div>			
        </div>
        <!-- /Main Wrapper -->
@endsection