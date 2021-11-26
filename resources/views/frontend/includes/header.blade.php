<!-- Navbar  -->
<div class="kavya-navbar" id="sticky-top">
    <div class="container">
        <nav class="nav-menu-wrapper">
            <span class="navbar-toggle" id="navbar-toggle">
                <i class="fas fa-bars"></i>
            </span>
            <div class="brand-name">
                <a href="{{route('frontend.index')}}">
                    <p>Blog</p>
                </a>
            </div>
            <ul class="nav-menu ml-auto" id="nav-menu-toggle">
                <li class="nav-item"><a href="{{route('frontend.index')}}" class="nav-link">Home</a></li>
                {{-- <li class="nav-item"><a href="#" class="nav-link">Categories <span class="arrow-icon"> <span
                                class="left-bar"></span>
                            <span class="right-bar"></span></span>
                    </a>
                    <ul class="drop-menu">
                        <li class="drop-menu-item"><a href="archive-layout-one.html">Food</a></li>
                        <li class="drop-menu-item"><a href="archive-layout-one.html">Technology</a></li>
                        <li class="drop-menu-item"><a href="archive-layout-one.html">Fashion</a></li>
                        <li class="drop-menu-item"><a href="archive-layout-one.html">Women</a></li>
                        <li class="drop-menu-item"><a href="archive-layout-one.html">Lifestyle</a></li>
                    </ul>
                </li>
                <li class="nav-item drop-arrow"><a href="#" class="nav-link">Pages <span class="arrow-icon"> <span
                    class="left-bar"></span>
                    <span class="right-bar"></span></span></a>
                    <ul class="drop-menu">
                    <li class="drop-menu-item"><a href="index.html">Home Page One</a></li>
                    <li class="drop-menu-item"><a href="index2.html">Home Page Two</a></li>
                    <li class="drop-menu-item"><a href="index3.html">Home Page Three</a></li>
                    <li class="drop-menu-item"><a href="index4.html">Home Page Dark</a></li>
                    <li class="drop-menu-item"><a href="index5.html">Home Page RTL</a></li>
                    <li class="drop-menu-item"><a href="404.html">404 Error Page One</a></li>
                    <li class="drop-menu-item"><a href="404-text.html">404 Error Page Two</a></li>
                    <li class="drop-menu-item"><a href="search.html">Search Page</a></li>
                    </ul>
            </li>
            <li class="nav-item drop-arrow"><a href="#" class="nav-link">Layout <span class="arrow-icon"> <span
                    class="left-bar"></span>
                    <span class="right-bar"></span></span></a>
                <ul class="drop-menu">
                <li class="drop-menu-item"><a href="archive-layout-one.html">Archive Layout One</a></li>
                <li class="drop-menu-item"><a href="archive-layout-two.html">Archive Layout Two</a></li>
                <li class="drop-menu-item"><a href="archive-layout-three.html">Archive Layout Three</a></li>
                <li class="drop-menu-item"><a href="archive-layout-four.html">Archive Layout Four</a></li>
                <li class="drop-menu-item"><a href="single-layout-one.html">Single Layout One</a></li>
                <li class="drop-menu-item"><a href="single-layout-two.html">Single Layout Two</a></li>
                <li class="drop-menu-item"><a href="single-layout-three.html">Single Layout Three</a></li>
                <li class="drop-menu-item"><a href="single-layout-four.html">Single Layout Four</a></li>
                </ul>
            </li> --}}
            @if (Auth::user())
                <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
            @else
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log In</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
            @endif
            </ul>
        </nav>
    </div>
</div>
<!-- Navbar end -->