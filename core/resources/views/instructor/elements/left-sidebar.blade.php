            <div id="sidebar" class="active">
                <div class="sidebar-wrapper active">
                    <div class="sidebar-header position-relative">
                        <div class="d-flex align-items-center">
                            <div class="logo">
                                <a href="{{route('instructor.dashboard')}}"><img src="{{url('webroot/assets/images/logo/logo.svg')}}" alt="Logo" srcset=""></a>
                            </div>
                        </div>
                    </div>


                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-title">Menu</li>

                            <li class="sidebar-item @yield('dashboard') ">
                                <a href="{{route('instructor.dashboard')}}" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-item  @yield('coursesparent') has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Courses</span>
                                </a>
                                <ul class="submenu @yield('coursesparent')">
                                    <li class="submenu-item @yield('courses-add')">
                                        <a href="{{route('instructor.course.create')}}">Start New Courses</a>
                                    </li>
                                    <li class="submenu-item @yield('courses-active')">
                                        <a href="{{route('instructor.course.list')}}">Active Courses</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-item has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Layouts</span>
                                </a>
                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <a href="layout-default.html">Default Layout</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="layout-vertical-1-column.html">1 Column</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="layout-vertical-navbar.html">Vertical Navbar</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="layout-rtl.html">RTL Layout</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="layout-horizontal.html">Horizontal Menu</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>