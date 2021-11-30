@extends('admin.includes.master')
@section('title')Customize Site -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Customize Site</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Customize Site</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{route('admin.settings.index')}}" class="btn add-btn" ><i class="fa fa-eye"></i> View Site Settings</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Site Settings</h4>
                            @include('admin.includes.message')
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.settings.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">Basic Settings</h4>
                                        <div class="form-group">
                                            <label>Site Name:</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact:</label>
                                            <input type="tel" class="form-control" name="contact" value="{{ old('contact') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group">                                            
                                            <label class="col-form-label">Logo</label>
                                            <input class="form-control" type="file" name="image" id="image">
                                        </div>
                                        <div class="form-group">
                                            <img id="preview-image-before-upload"  style="max-height: 150px;"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="card-title">Social Settings</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Facebook:</label>
                                                    <input type="text" class="form-control" name="facebook" value="{{ old('facebook') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Twitter:</label>
                                                    <input type="text" class="form-control" name="twitter" value="{{ old('twitter') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>WhatsApp:</label>
                                                    <input type="text" class="form-control" name="whatsapp" value="{{ old('whatsapp') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>LinkedIn</label>
                                                    <input type="text" class="form-control" name="linkedin" value="{{ old('linkedin') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Footer Text:</label>
                                            <input type="text" class="form-control" name="footer" value="{{ old('footer') }}">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
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