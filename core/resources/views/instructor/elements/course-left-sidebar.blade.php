            <div id="sidebar" class="active">
                <div class="sidebar-wrapper active">
                    <div class="sidebar-header position-relative">
                        <div class="d-flex align-items-center">
                            <div class="logo">
                            <i class="fas fa-angle-left text-primary"></i>
                                <a href="{{route('instructor.dashboard')}}"  class="ml-3"><img src="{{url('webroot/assets/images/logo/logo.svg')}}" alt="Logo" class="ml-3"></a>
                            </div>
                        </div>
                    </div>


                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-item  @yield('coursesparent') has-sub">
                                <a href="#" class='sidebar-link'>
                                <i class="fas fa-info-circle"></i>
                                    <span>Plan Your Course</span>
                                </a>
                                <ul class="submenu @yield('coursesparent')">
                                    <li class="submenu-item @yield('courses-add')">
                                        <a href="{{route('instructor.course.intend')}}">Intended Learner</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item  @yield('coursecontent') has-sub">
                                <a href="#" class='sidebar-link'>
                                <i class="fab fa-readme"></i>
                                    <span>Create your content</span>
                                </a>
                                <ul class="submenu @yield('coursecontent')">
                                    <li class="submenu-item @yield('content-add')">
                                        <a href="{{route('instructor.course.create')}}">Create your content</a>
                                    </li>
                                    <li class="submenu-item @yield('curriculum-active')">
                                        <a href="{{route('instructor.course.list')}}">Curriculum</a>
                                    </li>
                                    <li class="submenu-item @yield('pricing-active')">
                                        <a href="{{route('instructor.course.list')}}">Pricing</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item  @yield('coursespublish') has-sub">
                                <a href="#" class='sidebar-link'>
                                <i class="fas fa-check-double"></i>
                                    <span>Publish your course</span>
                                </a>
                                <ul class="submenu @yield('coursespublish')">
                                    <li class="submenu-item @yield('promition-active')">
                                        <a href="{{route('instructor.course.list')}}">Promotions</a>
                                    </li>
                                    <li class="submenu-item @yield('messages-active')">
                                        <a href="{{route('instructor.course.list')}}">Course messages</a>
                                    </li>
                                    <li class="submenu-item @yield('faq-active')">
                                        <a href="{{route('instructor.course.list')}}">FAQ</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>