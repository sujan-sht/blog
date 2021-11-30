@extends('frontend.includes.master')
@section('title') Home - {{ config('app.name', 'Laravel') }} @endsection
@section('content')

<!-- Archive content -->
<section class="archive-content mt-4">
    <div class="container">
        <div class="row " id="main-content">
            <div class="col-md-7 col-lg-8 content">
                <!-- Archive posts -->
                <div class="archive-posts theiaStickySidebar">
                    @foreach ($posts as $post)
                    @if ($post->status=="Show")
                    <div class="card border-0 mb-5">
                        <div class="row no-gutters align-items-center align-items-center">
                            <div class="col-md-5">
                                <a href="#"><img src="{{asset('/image/'.$post->image) }}" class="card-img" alt=""></a>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <ul class="category-tag-list">
                                        <li class="category-tag-name">
                                            <a href="#">{{$post->category->category_name}}</a>
                                        </li>

                                    </ul>
                                    <h5 class="card-title title-font">
                                        <a href="{{route('frontend.single', $post->slug)}}">{{$post->title}}</a>
                                    </h5>
                                    <p class="card-text">{!! Str::limit($post->description,250) !!}</p>
                                    <a href="{{route('frontend.single', $post->slug)}}">Read more..</a>
                                        <div class="author-date">
                                            <a class="author" >
                                                <img src="{{asset('/image/profileImage/'.$post->user->image)}}" alt=""
                                                    class="rounded-circle" />
                                                <span class="writer-name-small">{{$post->user->name}}</span>
                                            </a>
                                            <a class="date">
                                                <span>{{date('jS M , Y',strtotime ($post->updated_at))}}</span>
                                            </a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                    @endif                  
                    @endforeach
                </div>
                <!-- Archive posts end -->
            </div>
            
            <div class="col-md-5 col-lg-4 sidebar">
                <!-- Sidebar posts -->
                <div id="sticker" class="theiaStickySidebar">
                    <div class="sidebar-posts">
                        <div class="sidebar-title">
                            <h5><i class="fas fa-circle"></i>Popular Posts</h5>
                        </div>
                        <div class="sidebar-content">
                            @foreach ($popularPosts as $popularPost)
                            <div class="card border-0">
                                <div class="row no-gutters align-items-center pb-2">
                                    <div class="col-3 col-md-3">
                                        <a href="{{route('frontend.single', $popularPost->slug)}}">
                                            <img src="{{asset('/image/'.$popularPost->image) }}" class="card-img" alt="">
                                        </a>
                                    </div>
                                    <div class="col-9 col-md-9">
                                        <div class="card-body">
                                            <ul class="category-tag-list mb-0">
                                                <li class="category-tag-name">
                                                    <a href="#">{{$popularPost->category->category_name}}</a>
                                                </li>
                                                <li class="float-right">
                                                    <i class="fa fa-eye"> <span> {{$popularPost->view_count}}</span></i>
                                                </li>
                                            </ul>
                                            <h5 class="card-title title-font"><a href="{{route('frontend.single', $popularPost->slug)}}">{{$popularPost->title}}</a>
                                            </h5>
                                            <div class="author-date">
                                                <a class="date">
                                                    <span>{{date('jS M , Y',strtotime ($popularPost->updated_at))}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="popular-tags mt-4">
                        <div class="sidebar-title">
                            <h5><i class="fas fa-circle"></i>Popular tags</h5>
                        </div>
                        <div class="sidebar-content">
                            <ul class="sidebar-list tags-list">
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">UI/UX</a></li>
                                <li><a href="#">Diet
                                    </a></li>
                                <li><a href="#">Lovelife</a></li>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Popular</a></li>
                                <li><a href="#">health</a></li>
                                <li><a href="#">VisitNepal</a></li>
                                <li><a href="#">travel</a></li>
                                <li><a href="#">freelance</a></li>
                                <li><a href="#">leadership</a></li>
                                <li><a href="#">happiness</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="sidebar-posts mt-4">
                        <div class="sidebar-title">
                            <h5><i class="fas fa-circle"></i>Categories</h5>
                        </div>
                        <div class="sidebar-content">
                            <div class="category-name-list">
                                @foreach ($categories as $category)
                                @if ($category->status==1)
                                <div class="card small-card">
                                    <img src="{{asset('frontend/assets/images/wall.jpg')}}" class="card-img"
                                            alt="" />
                                    <div class="card-img-overlay" style="background:none;">
                                        
                                        <h5 class="card-title title-font mb-0">
                                            {{$category->category_name}}
                                        </h5>
                                       
                                    </div>
                                </div>
                                @endif
                                @endforeach
                               

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar posts end -->
            </div>
        </div>
    </div>
    
</section>
<!-- Archive content end -->
        <!-- Pagination section -->
        <section class="pagination-section">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{$posts->links()}}
                    
                </ul>
            </nav>
        </section>
        <!-- pagination section end -->
@endsection


