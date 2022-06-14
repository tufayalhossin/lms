            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{url('webroot/app/images/logo-dark.png')}}" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{url('webroot/app/images/logo_sm_dark.png')}}" alt="" height="16">
                    </span>
                </a>

                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{url('webroot/app/images/logo-dark.png')}}" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{url('webroot/app/images/logo_sm_dark.png')}}" alt="" height="16">
                    </span>
                </a>
    
                <div class="h-100" id="leftside-menu-container" data-simplebar>

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>
                        <!-- Dashboard -->
                        <li class="side-nav-item">
                            <a href="{{route('admin.dashboard')}}" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <!-- End Dashboard -->
                        
                        <li class="side-nav-item @yield('categoryparent')">
                            <a data-bs-toggle="collapse" href="#catelogManagment" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil uil-server"></i>
                                <span> Manage Catelog  </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse @yield('categoryparent')" id="catelogManagment">
                                <ul class="side-nav-second-level">
                                    <li class="@yield('category-active')">
                                        <a href="{{route('admin.category.list')}}">{{__("Category")}}</a>
                                    </li>
                                    <li class="@yield('subcategory-active')">
                                        <a href="{{route('admin.subcategory.list')}}">{{__("Sub Category")}}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item @yield('studentparent')">
                            <a data-bs-toggle="collapse" href="#studentManagment" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil  uil-users-alt"></i>
                                <span> Manage students  </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse @yield('studentparent')" id="studentManagment">
                                <ul class="side-nav-second-level">
                                    <li class="@yield('student-active')">
                                        <a href="{{route('admin.students.list',['Active'])}}">{{__("Active Students")}}</a>
                                    </li>
                                    <li class="@yield('student-blocked')">
                                        <a href="{{route('admin.students.list',['Blocked'])}}">{{__("Blocked Students")}}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- instructor  -->
                        <li class="side-nav-item @yield('instructorparent')">
                            <a data-bs-toggle="collapse" href="#instructorManagment" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="mdi mdi-book-education-outline"></i>
                                <span> Manage instructors  </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse @yield('instructorparent')" id="instructorManagment">
                                <ul class="side-nav-second-level">
                                    <li class="@yield('instructor-active')">
                                        <a href="{{route('admin.instructors.list',['Active'])}}">{{__("Active instructors")}}</a>
                                    </li>
                                    <li class="@yield('instructor-blocked')">
                                        <a href="{{route('admin.instructors.list',['Blocked'])}}">{{__("Blocked instructors")}}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Ecommerce </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="apps-ecommerce-products.html">Products</a>
                                    </li>
                                    <li>
                                        <a href="apps-ecommerce-products-details.html">Products Details</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-title side-nav-item">Custom</li>
                        
                    </ul>

                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->