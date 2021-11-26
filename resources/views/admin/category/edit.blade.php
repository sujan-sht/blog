@extends('admin.includes.master')
@section('title')Edit Category -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit Category</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            
                            @include('admin.includes.message')
                        </div>
                        <div class="card-body">
                            <form action="{{ '/category/edit/' . $myCategory->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Under myCategory</label>
                                        <select class="select form-control" name="parent_id">
                                            <option selected disabled>Select Category</option>
                                            <option value="0" @if($myCategory->parent_id == 0) selected @endif>Main Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($myCategory->parent_id == $category->id ) selected @endif>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Category Name</label>
                                        <input type="text" class="form-control" name="category_name" value="{{ old('category_name',$myCategory->category_name) }}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Status</label><br>
                                        <div class="radio form-check-inline">
                                            <label>
                                                <input type="radio" name="status" value="1" @if(old('status') == '1' || $myCategory->status == '1') checked @endif> Show
                                            </label>
                                        </div>
                                        <div class="radio form-check-inline">
                                            <label>
                                                <input type="radio" name="status" value="0" @if(old('status') == '0' || $myCategory->status == '0') checked @endif> Hide
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success float-right">Update Post</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        
        </div>			
    </div>
    <!-- /Main Wrapper -->
@endsection