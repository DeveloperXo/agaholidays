<x-master-layout :meta="$meta">

    @vite(['resources/css/destinations.css'])
    
    @if (!is_null($destinations))
    <!-- Banner -->
    @include('user.u_components.page_banner')

    <!-- Destinations -->
    <section id="page-destinations" class="page-destinations mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('user.destinations.destination_list')
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