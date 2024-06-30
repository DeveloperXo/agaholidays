<x-master-layout :meta="$meta">
    @vite(['resources/css/packages_page.css'])
    
    @if (!is_null($packages))
    <!-- Banner -->
    @include('user.u_components.page_banner')

    <!-- Packages & Sidebar -->
    <section id="page-packages" class="page-packages mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <!-- Sidebar -->
                    @include('user.packages.sidebar')
                </div>
                <div class="col-12 col-lg-9">
                    <!-- Package List -->
                    @include('user.packages.package_list')
                </div>
            </div>
        </div>
    </section>

    @else
        <div class="container my-5">
            <h4 class="text-danger">Something went wrong!</h4>
        </div>
    @endif 

</x-master-layout>