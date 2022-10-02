            <div id="sidebar" class="active">
                <div class="sidebar-wrapper active">
                    <div class="sidebar-header d-flex align-items-center" style="font-size: 1.2rem;">
                            <a href="{{route('instructor.dashboard')}}"  class="ml-3"><i class="bi bi-arrow-bar-left icon-inline"></i> Back Courses</a>
                        </div>


                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-item  @yield('intendparent') has-sub">
                                <a href="#" class='sidebar-link'>
                                <i class="fas fa-info-circle"></i>
                                    <span>Plan Your Course</span>
                                </a>
                                <ul class="submenu @yield('intendparent')">
                                    <li class="submenu-item @yield('intend-add')">
                                        <a href="{{route('instructor.course.intend',[request()->operationID])}}">Intended Learner</a>
                                    </li>
                                </ul>
                            </li>
                            @if(request()->operationID)
                            <li class="sidebar-item  @yield('coursecontent') has-sub">
                                <a href="#" class='sidebar-link'>
                                <i class="fab fa-readme"></i>
                                    <span>Create your content</span>
                                </a>
                                <ul class="submenu @yield('coursecontent')">
                                    <li class="submenu-item @yield('content-add')">
                                        <a href="{{route('instructor.course.create',[request()->operationID])}}">Create landing page</a>
                                    </li>
                                    <li class="submenu-item @yield('curriculum-add')">
                                        <a href="{{route('instructor.course.curriculum',[request()->operationID])}}">Curriculum</a>
                                    </li>
                                    <li class="submenu-item @yield('pricing-add')">
                                        <a href="{{route('instructor.course.pricing',[request()->operationID])}}">Pricing</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item  @yield('coursespublish') has-sub">
                                <a href="#" class='sidebar-link'>
                                <i class="fas fa-check-double"></i>
                                    <span>Publish your course</span>
                                </a>
                                <ul class="submenu @yield('coursespublish')">
                                    <li class="submenu-item @yield('landing-media-add')">
                                        <a href="{{route('instructor.course.landing_media',[request()->operationID])}}">Landing media</a>
                                    </li>
                                    <li class="submenu-item @yield('promotion')">
                                        <a href="{{route('instructor.course.promotion',[request()->operationID])}}">Promotions</a>
                                    </li>
                                    <li class="submenu-item @yield('messages')">
                                        <a href="{{route('instructor.course.messages',[request()->operationID])}}">Course messages</a>
                                    </li>
                                    <li class="submenu-item @yield('faq')">
                                        <a href="{{route('instructor.course.faq',[request()->operationID])}}">FAQ</a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>