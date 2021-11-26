@extends('admin.includes.master')
@section('title')Edit Blog Post -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit a Blog Post</h3>
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
                            <h4 class="card-title mb-0">Write a unique blog</h4>
                            @include('admin.includes.message')
                        </div>
                        <div class="card-body">
                            <form action="{{ '/blog/edit/' . $post->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Blog Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Under Category</label>
                                        <select class="select form-control" name="category_id">
                                            @php echo $categories_dropdown;  @endphp
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Description</label>
                                        <textarea name="editor1" class="form-control">{{ old('editor1', $post->description) }}</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Image</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Status</label><br>
                                        <div class="radio form-check-inline">
                                            <label>
                                                <input type="radio" name="status" value="Show" @if(old('status') == 'Show' || $post->status == 'Show') checked @endif> Show
                                            </label>
                                        </div>    
                                        <div class="radio form-check-inline">
                                            <label>
                                                <input type="radio" name="status" value="Hide" @if(old('status') == 'Hide' || $post->status == 'Hide') checked @endif> Hide
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <img id="preview-image-before-upload"  style="max-height: 150px;">
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

@section('scripts')
<script type="text/javascript">
    CKEDITOR.replace('editor1', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
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