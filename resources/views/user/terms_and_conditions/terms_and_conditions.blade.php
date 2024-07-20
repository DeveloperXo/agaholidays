<x-master-layout :meta="$meta">
    @vite(['resources/css/about_page.css'])
    
    <!-- Banner -->
    @include('user.u_components.page_banner')

    <!-- About Us -->
    <section id="page-privacy-policy" class="page-privacy-policy mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('user.terms_and_conditions.body')
                </div>
            </div>
        </div>
    </section>

</x-master-layout>