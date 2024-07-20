<!--Desktop Menu-->
<nav class="navbar navbar-expand-lg bg-body-tertiary desktop-nav d-none d-lg-block">
    <div class="container-fluid">
        <div class="row w-100">
            <div class="col align-content-center">
                <a class="navbar-brand" href="{{ route('user_home') }}">L O G O</a>
            </div>
            <div class="col-6">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->route()->getName() === 'user_home' ? 'active' : ''  }}" aria-current="page" href="{{ route('user_home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() === 'user_packages' ? 'active' : ''  }}" href="{{ route('user_packages') }}">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() === 'user_destinations' ? 'active' : ''  }}" href="{{ route('user_destinations') }}">Destinations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() === 'user_blogs' ? 'active' : ''  }}" href="{{ route('user_blogs') }}">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() === 'user_about' ? 'active' : ''  }}" href="{{ route('user_about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() === 'user_contact' ? 'active' : ''  }}" href="{{ route('user_contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col d-flex align-items-center justify-content-end">
                @if(auth()->check())
                    <ul class="navbar-nav mb-2 mb-lg-0 justify-content-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                {{--<li><a class="dropdown-item" href="{{ route('dashboard') }}">Dahsboard</a></li>--}}
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <a class="dropdown-item" href="#" onclick="this.parentElement.submit()">Log Out</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <div class="d-flex justify-content-end gap-3">
                        <a class="btn btn-secondary" type="submit" href="{{ route('login') }}">Log In</a>
                        <a class="btn btn-primary" type="submit" href="{{ route('register') }}">Sign Up</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>

<!--Mobile Menu-->
<nav class="navbar navbar-expand-lg bg-body-tertiary d-lg-none d-md-block mobile-nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user_home') }}">L O G O</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'user_home' ? 'active' : ''  }}" aria-current="page" href="{{ route('user_home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'user_packages' ? 'active' : ''  }}" href="{{ route('user_packages') }}">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'user_destinations' ? 'active' : ''  }}" href="{{ route('user_destinations') }}">Destinations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'user_blogs' ? 'active' : ''  }}" href="{{ route('user_blogs') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'user_about' ? 'active' : ''  }}" href="{{ route('user_about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->route()->getName() === 'user_contact' ? 'active' : ''  }}" href="{{ route('user_contact') }}">Contact Us</a>
                </li>
            </ul>
            <div class="col align-content-center">
                @if(auth()->check())
                    <ul class="navbar-nav mb-2 mb-lg-0 justify-content-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                <!-- <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dahsboard</a></li> -->
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <a class="dropdown-item" href="#" onclick="this.parentElement.submit()">Log Out</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <div class="d-flex gap-3">
                        <a class="btn btn-secondary" type="submit" href="{{ route('login') }}">Log In</a>
                        <a class="btn btn-primary" type="submit" href="{{ route('register') }}">Sign Up</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>