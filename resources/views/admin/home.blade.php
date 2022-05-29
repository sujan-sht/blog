
@extends('admin.includes.master')
@section('title')Admin Dashboard -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')
    			<!-- Page Wrapper -->
                <div class="page-wrapper">
			
                    <!-- Page Content -->
                    <div class="content container-fluid">
                    
                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item active">Admin Dashboard</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->
                    
                    </div>
                    <!-- /Page Content -->
    
                </div>
                <!-- /Page Wrapper -->
                
@endsection
    