@extends('admin.includes.master')
@section('title')View Category -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">All Category</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Category</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{route('admin.category.create')}}" class="btn add-btn" ><i class="fa fa-plus"></i> Add Category</a>
                </div>
            </div>
            
        </div>
        <!-- /Page Header -->
        
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    
                    @include('admin.includes.message')
                    <div class="card-body">
                        @if ($categories->count()==0)
                            <p class="text-warning">Sorry, no posts found</p>   
                        @else
                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                
                                <thead class="table-warning">
                                    <tr>
                                        <th>S.N</th>
                                        <th>Category Name</th>
                                        <th>Under Category</th>
                                        
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td>
                                            @if ($category->parent_id==0)
                                                Main Category
                                            @else
                                                {{$category->subCategory->category_name}}
                                            @endif
                                        </td>
                                        
                                        <td>
                                            @if ($category->status==1)
                                                Show
                                            @else
                                                Hide
                                            @endif
                                        </td>
                                        <td>
                                            <a href="category/edit/{{$category->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a href="category/delete/{{$category->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr> 
                                @endforeach
                                
                                    
                                
                                    
                                </tbody>
                            </table>
                        </div>
                        @endif
                        
                    </div>
                    {{-- <div class="d-flex justify-content-end">
                        {{$posts->links()}}    
                    </div>  --}}
                </div>
            </div>
        </div>
    
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection