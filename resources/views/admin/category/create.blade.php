@extends('admin.includes.master')
@section('title')Add Category -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Add Category</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{route('admin.category.index')}}" class="btn add-btn" ><i class="fa fa-eye"></i> View Category</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h4 class="card-title mb-0">Write a unique blog</h4> --}}
                            @include('admin.includes.message')
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Under Category</label>
                                        <select class="form-control" name="parent_id">
                                            <option selected disabled>Select Category</option>
                                            <option value="0">Main Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Category Name</label>
                                        <input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Status</label><br>
                                        <div class="radio form-check-inline">
                                            <label>
                                                <input type="radio" name="status" value="1" @if(old('status') == '1') checked @endif> Show
                                            </label>
                                        </div>
                                        <div class="radio form-check-inline">
                                            <label>
                                                <input type="radio" name="status" value="0" @if(old('status') == '0') checked @endif> Hide
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success float-right">Add Category</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        
        </div>			
    </div>
    <!-- /Main Wrapper -->
@endsection