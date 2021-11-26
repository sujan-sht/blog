@extends('admin.includes.master')
@section('title')View Blog Post -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
    
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">All Posts</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Posts</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{route('admin.post.create')}}" class="btn add-btn" ><i class="fa fa-plus"></i> Add Post</a>
                    </div>
                </div>
                
            </div>
            <!-- /Page Header -->
            
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-0">
                        
                        @include('admin.includes.message')
                        <div class="card-body">
                            @if ($posts->count()==0)
                                <p class="text-warning">Sorry, no posts found</p>   
                            @else
                            <div class="table-responsive">
                                <table class="datatable table table-stripped mb-0">
                                    
                                    <thead class="table-warning">
                                        <tr>
                                            <th>S.N</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{!! Str::limit($post->title,20) !!}</td>
                                            <td>{{$post->category->category_name}}</td>
                                            <td>{{$post->status}}</td>
                                            <td><img src="{{asset('/image/'.$post->image)}}" alt="" class="img-fluid" width="100px" /></td>
                                            <td>
                                                <a href="blog/show/{{$post->id}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                                <a href="blog/edit/{{$post->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="blog/delete/{{$post->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr> 
                                    @endforeach
                                    
                                        
                                    
                                        
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            
                        </div>
                        <div class="d-flex justify-content-end">
                            {{$posts->links()}}    
                        </div> 
                    </div>
                </div>
            </div>
        
        </div>			
    </div>
    <!-- /Page Wrapper -->
    
@endsection