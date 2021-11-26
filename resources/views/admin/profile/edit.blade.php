@extends('admin.includes.master')
@section('title')Edit Profile -  {{ config('app.name', 'Laravel') }} @endsection

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
                            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name',Auth::user()->name)}}">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="col-form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{old('email',Auth::user()->email)}}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Current Password</label>
                                        <input type="password" class="form-control" name="current_password">
                                    </div>
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
                                    <div class="col-md-6">
                                        <label class="col-form-label">Profile Image</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">About You</label>
                                        <textarea class="form-control" rows="5" name="about">{{ old('about', Auth::user()->about) }}</textarea>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        
                                        <img id="preview-image-before-upload"  style="max-height: 150px;"> 
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success float-right">Update Profile</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        
        </div>			
    </div>
    <!-- /Main Wrapper -->
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
            
    $(document).ready(function (e) {
    
    
    $('#image').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-image-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });
    
    });
    
</script>
@endsection