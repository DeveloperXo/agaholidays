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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="col align-content-center">
                <div class="d-flex justify-content-end gap-3">
                    <button class="btn btn-secondary" type="submit">Log In</button>
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                </div>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <div class="col align-content-center">
                <div class="d-flex gap-3">
                    <button class="btn btn-secondary" type="submit">Log In</button>
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</nav>