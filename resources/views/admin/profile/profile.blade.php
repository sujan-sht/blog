@extends('admin.includes.master')
@section('title')View Profile -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="{{route('admin.profile.edit')}}" class="btn add-btn" ><i class="fa fa-pencil"></i> Edit Profile</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->          
                @include('admin.includes.message')
                
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            @isset(Auth::user()->image)
                                                <img src="{{('/image/profileImage/'.Auth::user()->image)}}" alt="Logo" width="100px">
                                            @else
                                                <img src="{{(asset('/image/profileImage/default.jpg'))}}" alt="Logo" width="100px">
                                            @endisset   
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left mt-4">
                                                    <h4 class="user-name">{{Auth::user()->name}}</h4>
                                                    <h4 class="text"><a href="">{{Auth::user()->email}}</a></h4>
                                                </div>  
                                            </div>
                                            <div class="col-md-7">
                                                {{Auth::user()->about}}
                                            </div>
                                        </div>
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