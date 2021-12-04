@extends('admin.includes.master')
@section('title')Site Settings -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
    <!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Site Settings</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Site Settings</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{route('admin.settings.create')}}" class="btn add-btn" ><i class="fa fa-plus"></i> Customize Site</a>
                </div>
            </div>
            
        </div>
        <!-- /Page Header -->
        
        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    @isset($setting->image)
                                        <img src="{{(asset('logo/'.$setting->image))}}" alt="Logo" width="100px">
                                    @else
                                        <img src="{{(asset('logo/logo.png'))}}" alt="Logo" width="100px">
                                    @endisset
                                </div>
                                
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">
                                                @isset($setting->name)
                                                    {{$setting->name}}                                               
                                                @endisset
                                            </h3>
                                            <h6 class="text-muted">{{Auth::user()->name}}</h6>
                                            <div class="staff-id">User ID : {{Auth::user()->id}}</div>
                                            <div class="small doj text-muted">
                                                @isset($setting->updated_at)
                                                    {{date('jS M , Y',strtotime ($setting->updated_at))}}              
                                                @endisset
                                            </div>
                                            <div class="staff-id">
                                                Footer Text :
                                                @isset($setting->footer)
                                                     {{$setting->footer}}        
                                                @endisset
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Contact:</div>
                                                <div class="text">
                                                    @isset($setting->contact)
                                                    {{$setting->contact}}        
                                                    @endisset
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Email:</div>
                                                <div class="text">
                                                    <a href="">
                                                        @isset($setting->email)
                                                            {{$setting->email}}        
                                                        @endisset
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Address:</div>
                                                <div class="text">
                                                    @isset($setting->address)
                                                        {{$setting->address}}        
                                                    @endisset
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Facebook:</div>
                                                <div class="text">
                                                    <a href="@isset($setting->facebook)
                                                        {{$setting->facebook}}        
                                                    @endisset">
                                                        @isset($setting->facebook)
                                                            {{$setting->facebook}}        
                                                        @endisset
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">WhatsApp:</div>
                                                <div class="text">
                                                    <a href="@isset($setting->whatsapp)
                                                        {{$setting->whatsapp}}        
                                                    @endisset">
                                                        @isset($setting->whatsapp)
                                                            {{$setting->whatsapp}}        
                                                        @endisset
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">LinkedIn:</div>
                                                <div class="text">
                                                    <a href="@isset($setting->linkedin)
                                                        {{$setting->linkedin}}        
                                                    @endisset">
                                                        @isset($setting->linkedin)
                                                            {{$setting->linkedin}}        
                                                        @endisset
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Twitter:</div>
                                                <div class="text">
                                                    <a href="@isset($setting->twitter)
                                                        {{$setting->twitter}}        
                                                    @endisset">
                                                        @isset($setting->twitter)
                                                            {{$setting->twitter}}        
                                                        @endisset
                                                    </a>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @isset($setting->id)
                            <div class="pro-edit">
                                <a class="edit-icon" href="/settings/edit/{{$setting->id}}">
                                <i class="fa fa-pencil">
                                </i>
                                </a>
                            </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection