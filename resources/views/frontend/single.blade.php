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
                  View all comments ( 3 )
                </a>
              </div>
              <div class="collapse" id="collapseExample">
                <div class="card comment-card">
                  <div class="card-body">
                    <div class="author-date">
                      <div class="author">
                        <img src="assets/images/person1.jpg" alt="" class="rounded-circle" />
                      </div>
                      <div class="inner-author-date">
                        <div class="author">
                          <span class="">Ana Grainger</span>
                        </div>
                        <div class="date"><span>1 Feb, 2019</span></div>
                      </div>
                    </div>
                    <div class="comment-text mt-2">
                      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos quos optio
                        ab numquam excepturi commodi nam omnis eaque, culpa earum!</p>
                    </div>
                  </div>

                  <div class="card comment-card">
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
                  </div>
                </div>
                <div class="card comment-card">
                  <div class="card-body">
                    <div class="author-date">
                      <div class="author">
                        <img src="assets/images/person2.jpg" alt="" class="rounded-circle" />
                      </div>
                      <div class="inner-author-date">
                        <div class="author">
                          <span class="">Iman Lindsay</span>
                        </div>
                        <div class="date"><span>1 Feb, 2019</span></div>
                      </div>
                    </div>
                    <div class="comment-text mt-2">
                      <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ipsum voluptatum suscipit
                        ipsam, dolorem quas animi magnam repellendus. Quidem unde maxime fugit, cupiditate veritatis
                        maiores dolor corporis consequuntur pariatur quo culpa ipsum! Eos aliquid deserunt incidunt
                        ratione ullam eaque. Ducimus?</div>
                    </div>
                  </div>
                </div>
                <div class="card comment-card">
                  <div class="card-body">
                    <div class="author-date">
                      <div class="author">
                        <img src="assets/images/person3.jpg" alt="" class="rounded-circle" />
                      </div>
                      <div class="inner-author-date">
                        <div class="author">
                          <span class="">Simone Bob</span>
                        </div>
                        <div class="date"><span>1 Feb, 2019</span></div>
                      </div>
                    </div>
                    <div class="comment-text mt-2">
                      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos quos optio
                        ab numquam excepturi commodi nam omnis eaque, culpa earum!</p>
                    </div>
                  </div>
                </div>
              </div>
              <form class="comment-form">
                <h5>Leave a comment</h5>
                <div class="row">
                  <div class="col-12 col-md-6 mb-4">
                    <input type="text" class="form-control" placeholder="Full Name">
                  </div>
                  <div class="col-12 col-md-6 mb-4">
                    <input type="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="col-12 mb-4">
                    <textarea rows="7" class="form-control" placeholder="Comment"></textarea>
                  </div>
                </div>
                <button class="btn btn-solid">Submit</button>
              </form>
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
                <div class="card border-0">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3 col-md-3">
                      <a href="#">
                        <img src="assets/images/sea-lighthouse.jpg" class="card-img" alt="">

                      </a>
                    </div>
                    <div class="col-9 col-md-9">
                      <div class="card-body">
                        <ul class="category-tag-list mb-0">

                          <li class="category-tag-name">
                            <a href="#">Lifestyle</a>
                          </li>
                        </ul>
                        <h5 class="card-title title-font"><a href="#">Lighthouse since
                            ages</a>
                        </h5>
                        <div class="author-date">

                          <a class="date" href="#">
                            <span>21 Dec, 2019</span>
                          </a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="card border-0">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3 col-md-3">
                      <a href="#">
                        <img src="assets/images/paris.jpg" class="card-img" alt="">

                      </a>
                    </div>
                    <div class="col-9 col-md-9">
                      <div class="card-body">
                        <ul class="category-tag-list mb-0">

                          <li class="category-tag-name">
                            <a href="#">Lifestyle</a>
                          </li>
                        </ul>
                        <h5 class="card-title title-font"><a href="#">5 things you should
                            not miss about Paris</a>
                        </h5>
                        <div class="author-date">

                          <a class="date" href="#">
                            <span>21 Dec, 2019</span>
                          </a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="card border-0">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3 col-md-3">
                      <a href="#">
                        <img src="assets/images/orange-bus.jpg" class="card-img" alt="">

                      </a>
                    </div>
                    <div class="col-9 col-md-9">
                      <div class="card-body">
                        <ul class="category-tag-list mb-0">

                          <li class="category-tag-name">
                            <a href="#">Lifestyle</a>
                          </li>
                        </ul>
                        <h5 class="card-title title-font"><a href="#">5 reasons for travelling more</a>
                        </h5>
                        <div class="author-date">

                          <a class="date" href="#">
                            <span>21 Dec, 2019</span>
                          </a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="card border-0">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3 col-md-3">
                      <a href="#">
                        <img src="assets/images/city-pink.jpg" class="card-img" alt="">

                      </a>
                    </div>
                    <div class="col-9 col-md-9">
                      <div class="card-body">
                        <ul class="category-tag-list mb-0">

                          <li class="category-tag-name">
                            <a href="#">Lifestyle</a>
                          </li>
                        </ul>
                        <h5 class="card-title title-font"><a href="#">Pink city</a>
                        </h5>
                        <div class="author-date">
                          <a class="date" href="#">
                            <span>21 Dec, 2019</span>
                          </a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="card border-0">
                  <div class="row no-gutters align-items-center">
                    <div class="col-3 col-md-3">
                      <a href="#">
                        <img src="assets/images/umbrella.jpg" class="card-img" alt="">

                      </a>
                    </div>
                    <div class="col-9 col-md-9">
                      <div class="card-body">
                        <ul class="category-tag-list mb-0">

                          <li class="category-tag-name">
                            <a href="#">Lifestyle</a>
                          </li>
                        </ul>
                        <h5 class="card-title title-font"><a href="#">Top 10 tips with common lifestyles</a>
                        </h5>
                        <div class="author-date">

                          <a class="date" href="#">
                            <span>21 Dec, 2019</span>
                          </a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
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