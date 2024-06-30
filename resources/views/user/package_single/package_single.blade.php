<x-master-layout :meta="$meta">
    @vite(['resources/css/package_single.css'])

    @if (!is_null($package))
    <!-- Header -->
    @include('user.package_single.header')

    <!-- Body -->
    <section id="page-single-package" class="page-single-package mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Body -->
                    @include('user.package_single.body')
                </div>
                <div class="col-12 col-lg-4">
                    <!-- Sidebar -->
                    @include('user.package_single.sidebar')
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