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
                    <a href="{{route('admin.navbar.create')}}" class="btn add-btn" ><i class="fa fa-plus"></i> Add Menu</a>
                </div>
            </div>
            
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    
                    @include('admin.includes.message')
                    <div class="card-body">
                        @if ($menus->count()==0)
                            <p class="text-warning">Sorry, no menus found</p>   
                        @else
                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                
                                <thead class="table-warning">
                                    <tr>
                                        <th>S.N</th>
                                        <th>Menu Name</th>
                                        <th>Route</th>
                                        <th>Order</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$menu->name}}</td>
                                        <td>{{$menu->url}}</td>
                                        <td>{{$menu->order}}</td>
                                        <td>
                                            <a href="navbar/edit/{{$menu->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a href="navbar/delete/{{$menu->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr> 
                                @endforeach
                                
                                    
                                
                                    
                                </tbody>
                            </table>
                        </div>
                        @endif
                        
                    </div>
                     
                </div>
            </div>
        </div>
        
        
    
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection