<x-master-layout :meta="$meta">
    @vite(['resources/css/contact_page.css'])
    
    <!-- Banner -->
    @include('user.u_components.page_banner')

    <!-- Contact Us -->
    <section id="page-contact" class="page-contact mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('user.contact.body')
                </div>
            </div>
        </div>
    </section>

</x-master-layout>