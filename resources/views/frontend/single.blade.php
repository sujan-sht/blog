
@extends('frontend.includes.master')
@section('title') {{$post->slug}} - {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<section class="single-layout mt-3">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-lg-8 content">
          <div class="blog-content-wrap theiaStickySidebar">
            <div class="blog-img-main">
              <img src="{{asset('/image/'.$post->image) }}" alt="">
            </div>
            <div class="blog-title-wrap">
              <ul class="category-tag-list mb-0">
              @if ($post->category->parent_id == 0)
                <li class="category-tag-name">
                  <a href="#">{{$post->category->category_name}}</a>
                </li>
              @else
              
                <li class="category-tag-name">
                  <a href="#">
                    @if ($post->category->id != $post->category->parent_id) Feature @endif
                  </a>
                </li>
                <li class="category-tag-name">
                  <a href="#">{{$post->category->category_name}}</a>
                </li>
              @endif
              </ul>
              <h1 class="title-font">{{$post->title}}</h1>
              <div class="author-date">
                <a class="author" href="#">
                  <img src="{{asset('/image/profileImage/'.$post->user->image)}}" alt="" class="rounded-circle" />
                  <span class="">{{$post->user->name}}</span>
                </a>
                <a class="date" href="#">
                  <span>Posted on {{date('jS M , Y',strtotime ($post->updated_at))}}</span>
                </a>
              </div>
            
            </div>
            <div class="blog-desc">
              {!! $post->description !!}
            </div>
            <div class="tags-wrap">
              <div class="share-buttons">
                <p>Share Now:</p>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
              </div>
            </div>
            <div class="blog-author-info">
              <div class="author-img">
                <img src="{{asset('/image/profileImage/'.$post->user->image)}}" alt="">
              </div>
              <div class="author-desc">
                <small>written by</small>
                <h5>{{$post->user->name}}</h5>
                <p>{!! $post->user->about !!} </p>
              </div>
            </div>
            <div class="comment-section">
              <div class="all-response">
                <a class="btn view-all-btn" data-toggle="collapse" href="#collapseExample" role="button"
                  aria-expanded="false" aria-controls="collapseExample">
                  View all comments ( {{$post->comments->count()}} )
                </a>
              </div>
              <div class="collapse" id="collapseExample">
                @foreach ($post->comments as $comment)
                <div class="card comment-card">
                  <div class="card-body">
                    <div class="author-date">
                      <div class="author">
                        <img src="{{asset('/image/profileImage/'.$comment->user->image)}}" alt="" class="rounded-circle" />
                      </div>
                      <div class="inner-author-date">
                        <div class="author">
                          <span class="">{{$comment->user->name}}</span>
                        </div>
                        <div class="date"><span>{{date('jS M , Y',strtotime ($comment->updated_at))}}</span></div>
                      </div>
                    </div>
                    <div class="comment-text mt-2">
                      <p>{{$comment->comment}}</p>
                      
                    </div>
                    @if (Auth::user())
                    <div class="d-flex justify-content-end">
                      @if (Auth::user()->id == $comment->user_id)
                        <a href="comment/edit/{{$comment->id}}" class="badge badge-success p-2 mr-2"> Edit </a>
                        <a href="comment/delete/{{$comment->id}}" class="badge badge-danger p-2"> Delete </a>
                       
                      @endif
                    </div>
                    @endif
                    
                    {{-- <form action="{{'/comment/edit/' . $comment->id}}" method="post">  
                      <div class="row">
                        <div class="col-12 mb-4">
                          <textarea name="comment" rows="7" class="form-control" placeholder="Comment"></textarea>
                        </div>
                    </div>
                  </form> --}}
                  </div>

                  {{-- <div class="card comment-card">
                    <div class="card-body">
                      <div class="author-date">
                        <div class="author">
                          <img src="assets/images/writer.jpg" alt="" class="rounded-circle" />
                        </div>
                        <div class="inner-author-date">
                          <div class="author">
                            <span>Julie Perry</span>
                          </div>
                          <div class="date"><span>1 Feb, 2019</span></div>
                        </div>
                      </div>
                      <div class="comment-text mt-2">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos quos optio
                          ab numquam excepturi commodi nam omnis eaque, culpa earum!</p>
                      </div>
                    </div>
                  </div> --}}
                </div>
                @endforeach
                
              </div>
              @if (Auth::user())
              <form class="comment-form" method="post" action="{{route('comment.store', $post->id)}}">
                @csrf
                <h5>Leave a comment</h5>
                <div class="row">
                  <div class="col-12 mb-4">
                    <textarea name="comment" rows="7" class="form-control" placeholder="Comment"></textarea>
                  </div>
                </div>
                <button type="submit" class="btn btn-solid">Submit</button>
              </form>
              @else
              <div class="row mt-3">
                <div class="col-12 mb-4 d-flex justify-content-center">
                  <h5 class="text-primary">Please Login To Comment On Posts.</h5>
                </div>
              </div>
              @endif
              
            </div>
          </div>
        </div>
        <div class="col-md-5 col-lg-4 sidebar">
          <div id="sticky-single" class="theiaStickySidebar">
            <div class="author-section">
              <div class="card author-card">
                <h3 class="title-font">About the author</h3>
                <div class="card-img">
                  <img src="{{asset('/image/profileImage/'.$post->user->image)}}" alt="">
                </div>
                <h5><a href="#">{{$post->user->name}}</a></h5>
                <small>Chief author</small>
                <p class="card-text">{!! $post->user->about !!}</p>

                <div class="social-links circular-icons">
                  
                
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox "></div>
            
            
                  
                </div>
              </div>
            </div>

            <div class="sidebar-posts">
              <div class="sidebar-title">
                <h5><i class="fas fa-circle"></i>Popular Posts</h5>
              </div>
              <div class="sidebar-content">
                @foreach ($popularPosts as $popularPost)
                <div class="card border-0">
                  <div class="row no-gutters align-items-center">
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
            <div class="recent-posts mt-4">
              <div class="sidebar-title">
                <h5><i class="fas fa-circle"></i>Trending Now</h5>
              </div>
              <div class="sidebar-content overflow-hidden">
                <ul class="sidebar-list">
                  @foreach ($trends as $trend)                  
                  <li class="sidebar-item">
                    <div class="num-left">
                      {{$no++}}
                    </div>
                    <div class="content-right">
                      <a href="{{route('frontend.single', $trend->slug)}}">{!! Str::limit($trend->title,45) !!}</a>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </section>    
@endsection