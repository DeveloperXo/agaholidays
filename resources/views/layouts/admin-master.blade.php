<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Dashboard - {{ config('app.name', 'AGA Holidays') }}</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="" rel="icon">
        <link href="" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
            
        <!-- Vendor CSS Files -->
        <!-- <link href="{{ asset('assets/admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('assets/admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

        
        <!-- CSS -->
        @vite(['resources/sass/app.scss'])
        
        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">

        <!-- Jquery -->
        <script src="{{ asset('assets/admin/vendor/jquery/jquery-3.7.1.min.js') }}"></script>
        

        <!-- =======================================================
        * Template Name: NiceAdmin
        * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        * Updated: Apr 20 2024 with Bootstrap v5.3.3
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
        
    </head>

    <body>
        @if(session('success'))
            <div
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="alert alert-success alert-dismissible fade show alert-absolute" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="alert alert-danger alert-dismissible fade show alert-absolute" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('warning'))
            <div 
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="alert alert-warning alert-dismissible fade show alert-absolute" role="alert">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('info'))
            <div
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)" 
                class="alert alert-info alert-dismissible fade show alert-absolute" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('user_home') }}" class="logo d-flex align-items-center">
                    <span class="d-none d-lg-block">AGA HOLIDAYS</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <span class="dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>{{ auth()->user()->name }}</h6>
                                <span>{{ auth()->user()->role }}</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}"> {{-- No! No special profile for admins! --}}
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('admin_logout') }}" method="post">
                                    @csrf
                                    <a class="dropdown-item d-flex align-items-center" href="#" onclick="this.parentElement.submit()">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Sign Out</span>
                                    </a>
                                </form>
                            </li>

                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->

        </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link bg-white" href="{{ route('admin_dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->route()->getName() === 'admin_users.view_all' ? '' : 'collapsed' }}" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="nav-content collapse {{ request()->route()->getName() === 'admin_users.view_all' ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="{{ request()->route()->getName() === 'admin_users.view_all' ? 'active' : '' }}" href="{{ route('admin_users.view_all') }}">
                            <i class="bi bi-circle"></i><span>All Users</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#package-query-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-envelope-open-heart"></i><span>Package Queries</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="package-query-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_package_queries.view_all') }}">
                            <i class="bi bi-circle"></i><span>All Queries</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#contact-query-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-envelope-at"></i><span>Contact Queries</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="contact-query-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_contact_queries.view_all') }}">
                            <i class="bi bi-circle"></i><span>All Queries</span>
                        </a>
                    </li>
                </ul>
            </li>

            <hr>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#blogs-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-file-earmark-richtext"></i><span>Blogs</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="blogs-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_blogs.view_all') }}">
                            <i class="bi bi-circle"></i><span>Manage Blogs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_blogs.view_create') }}">
                            <i class="bi bi-circle"></i><span>Add New</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#destinations-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-signpost-split"></i><span>Destinations</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="destinations-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_destinations.view_all') }}">
                            <i class="bi bi-circle"></i><span>Manage Destinations</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_destinations.view_create') }}">
                            <i class="bi bi-circle"></i><span>Add New</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#packages-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-image-alt"></i><span>Packages</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="packages-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_packages.view_all') }}">
                            <i class="bi bi-circle"></i><span>Manage Packages</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_packages.view_create') }}">
                            <i class="bi bi-circle"></i><span>Add New</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#categories-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-list-ul"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="categories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_categories.view_all') }}">
                            <i class="bi bi-circle"></i><span>Manage Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_categories.view_create') }}">
                            <i class="bi bi-circle"></i><span>Add New</span>
                        </a>
                    </li>
                </ul>
            </li>

            <hr>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#cities-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-geo-alt"></i><span>Cities</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="cities-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_cities.view_all') }}">
                            <i class="bi bi-circle"></i><span>Manage Cities</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_cities.view_create') }}">
                            <i class="bi bi-circle"></i><span>Add New</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#countries-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-globe-americas"></i><span>Countries</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="countries-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_countries.view_all') }}">
                            <i class="bi bi-circle"></i><span>Manage Countries</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_countries.view_create') }}">
                            <i class="bi bi-circle"></i><span>Add New</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#destination-places-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-geo"></i><span>Destination Places</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="destination-places-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_destination_places.view_all') }}">
                            <i class="bi bi-circle"></i><span>Manage Destination Places</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_destination_places.view_create') }}">
                            <i class="bi bi-circle"></i><span>Add New</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#departure-places-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-clipboard-data"></i><span>Departure Cities</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="departure-places-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_departure_cities.view_all') }}">
                            <i class="bi bi-circle"></i><span>Manage Departure Cities</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_departure_cities.view_create') }}">
                            <i class="bi bi-circle"></i><span>Add New</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#page-settings-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear"></i><span>Pages</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="page-settings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_manage_pages') }}">
                            <i class="bi bi-circle"></i><span>Manage Pages</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link bg-white" href="/i-am-healthy">
                    <i class="bi bi-circle bg-none"></i><span>Check Health</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->

        <main id="main" class="main">
            {{ $slot }}
        </main>

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer d-none">
            <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/chart.js/chart.umd.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/echarts/echarts.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/quill/quill.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/tinymce/tinymce.min.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('assets/admin/js/main.js') }}"></script>
        @vite(['resources/js/app.js', 'resources/js/admin.js'])

    </body>
</html>