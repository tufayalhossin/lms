<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{auth()->user()->name}}</h6>
                                <p class="mb-0 text-sm text-gray-600">Administrator</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{url('webroot/assets/images/faces/1.jpg')}}">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Hello, {{explode(' ', auth()->user()->name)[0]}}!</h6>
                        </li>


                        <li><a class="dropdown-item" href="#">
                                <i class="icon-mid bi bi-person me-2"></i>
                                My Profile
                            </a>
                        </li>

                        <li><a class="dropdown-item" href="#">
                                <i class="icon-mid bi bi-suit-heart me-2"></i>
                                Favorites
                            </a>
                        </li>

                        <li><a class="dropdown-item" href="#">
                                <i class="icon-mid bi bi-collection-play me-2"></i>
                                Collections
                            </a>
                        </li>
                        <?php if (auth()->user()->isStudent) { ?>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <h6 class="dropdown-header">Student!</h6>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('dashboard')}}">
                                    <i class="bi bi-tv me-1"></i>
                                    <span> Deshboard</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li>
                                <hr class="dropdown-divider">
                            </li>

                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                Settings</a></li>
                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                Wallet</a></li>

                        <li class="dropdown-item">
                            <a class="notify-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                <span>{{ __('Logout') }}</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>