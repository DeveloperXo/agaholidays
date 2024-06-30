<x-master-layout :meta="$meta">
    @vite(['resources/css/destination_single.css'])

    @if (!is_null($destination))
    <!-- Header -->
    @include('user.u_components.page_banner')

    <!-- Body -->
    <section id="page-single-destination" class="page-single-destination mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Body -->
                    @include('user.destination_single.body')
                </div>
                <div class="col-12 col-lg-4">
                    <!-- Sidebar -->
                    @include('user.destination_single.sidebar')
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