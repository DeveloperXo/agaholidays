<x-master-layout :meta="$meta">
    @vite(['resources/css/about_page.css'])
    
    <!-- Banner -->
    @include('user.u_components.page_banner')

    <!-- About Us -->
    <section id="page-about" class="page-about mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('user.about.body')
                </div>
            </div>
        </div>
    </section>

</x-master-layout>