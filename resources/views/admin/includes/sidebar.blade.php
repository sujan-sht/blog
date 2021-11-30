<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li>
                    <a href="{{route('frontend.index')}}"><i class="la la-home"></i> <span> Go to site</span> </a>

                </li>
                <li>
                    <a href="{{ route('admin.dashboard') }}"><i class="la la-dashboard"></i> <span> Dashboard</span> </span></a>
                    {{-- <ul style="display: none;">
                        <li><a class="active" href="index.html">Admin Dashboard</a></li>
                        <li><a href="employee-dashboard.html">Employee Dashboard</a></li>
                    </ul> --}}
                </li>
                <li >
                    <a href="{{ route('admin.post.index') }}"><i class="la la-cube"></i> <span> Posts</span> </a>
                    {{-- <ul style="display: none;">
                        <li><a href="blog">View Post</a></li>
                        <li><a href="blog/create">Create Post</a></li>
                        <li><a href="edit">Edit Post</a></li>
                        <li><a href="contacts.html">Delete Post</a></li>

                    </ul> --}}
                </li>
                <li>
                    <a href="{{ route('admin.category.index') }}"><i class="la la-list"></i> <span> Category</span> </a>

                </li>
                <li>
                    <a href="{{route('admin.settings.index')}}"><i class="la la-cog"></i> <span> Site Settings</span> </a>

                </li>
                <li>
                    <a href="{{route('admin.navbar.index')}}"><i class="la la-cog"></i> <span> Navigation Menu</span> </a>

                </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->