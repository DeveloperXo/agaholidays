<x-master-layout :meta="$meta">
    @vite(['resources/css/blog_single.css'])
    @vite(['resources/css/blogs_page.css'])

    <!-- Body & Sidebar -->
    <section id="page-single-blog" class="page-single-blog mt-4">
        <div class="container">
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-12 col-lg-3 blogs-sidebar">
                    <!-- Sidebar -->
                    @include('user.blogs.sidebar')
                </div>
                <div class="col-12 col-lg-9">
                    <!-- Body -->
                    @include('user.blog_single.body')
                </div>
            </div>
        </div>
    </section>
</x-master-layout>