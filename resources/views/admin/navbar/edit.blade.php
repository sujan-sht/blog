
@extends('admin.includes.master')
@section('title')Menu Settings -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
    <!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Menu Settings</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Menu Settings</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{route('admin.navbar.index')}}" class="btn add-btn" ><i class="fa fa-eye"></i> View Menu</a>
                </div>
            </div>
            
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Edit Menu</h4>
                        @include('admin.includes.message')
                    </div>
                    <div class="card-body">
                        <form action="{{ '/navbar/edit/' . $myMenu->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label>Menu Name:</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $myMenu->name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Url:</label>
                                        <input type="text" class="form-control" name="url" value="{{ old('name',$myMenu->url) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Ordering:</label>
                                        <input type="number" class="form-control" name="order" value="{{ old('order',$myMenu->order) }}" min="0">
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
    
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection