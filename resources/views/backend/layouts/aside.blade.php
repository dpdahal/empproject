@section('aside')
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{route('dashboard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            @if(auth()->user()->role == 'admin')

                <li class="nav-item">
                    <a class="nav-link " href="{{route('users')}}">
                        <i class="bi bi-people-fill"></i>
                        <span>Users</span>
                    </a>
                </li><!-- End Dashboard Nav -->
            @endif


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Blog</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('manage-category.index')}}">
                            <i class="bi bi-circle"></i><span>Manage Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('manage-news.index')}}">
                            <i class="bi bi-circle"></i><span>Manage News</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->


        </ul>

    </aside><!-- End Sidebar-->

@endsection
