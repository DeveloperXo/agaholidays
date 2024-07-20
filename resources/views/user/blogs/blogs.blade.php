<x-master-layout :meta="$meta">
    @vite(['resources/css/blogs_page.css'])
    
    @if ($blogs)
        <!-- Banner -->
        @include('user.u_components.page_banner')

        <!-- Blog & Sidebar -->
        <section id="page-blogs" class="page-blogs mt-4">
            <div class="container">
                <div class="row flex-column-reverse flex-md-row">
                    <div class="col-12 col-lg-3">
                        <!-- Sidebar -->
                        @include('user.blogs.sidebar')
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- Blog List -->
                        @include('user.blogs.blog_list')
                    </div>
                </div>
            </div>
        </section>

    @else
        <!-- Error Message -->
        <div class="container my-5">
            @include('user.u_components.error')
        </div>
    @endif 

</x-master-layout>