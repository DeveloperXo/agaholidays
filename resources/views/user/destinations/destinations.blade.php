<x-master-layout :meta="$meta">
    @vite(['resources/css/destinations.css'])
    
    <!-- Banner -->
    @include('user.u_components.page_banner')

    <!-- Destinations & Sidebar -->
    <section id="page-destinations" class="page-destinations mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Destination List -->
                    @include('user.destinations.destination_list')
                </div>
            </div>
        </div>
    </section>

</x-master-layout>