@extends('admin.includes.master')
@section('title')Change Password -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit User Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.profile.profile')}}">Profile</a></li>
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
                            
                            
                        </div>
                        <div class="card-body">
                            @include('admin.includes.message')
                            <form action="{{route('profile.change_password')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Current Password</label>
                                        <input type="password" class="form-control" name="current_password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">New Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-success float-right">Change Password</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        
        </div>			
    </div>
    <!-- /Main Wrapper -->
@endsection

