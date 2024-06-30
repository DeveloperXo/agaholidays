<div class="blog-single-body pt-3">
    <div class="blog-text">
        <h1 class="blog-title">{{ $blog->blog_title }}</h1>
        <div class="blog-img-wrap mt-4">
            <img src="{{ asset('storage/'.$blog->featured_image) }}" alt="">
        </div>

        <div class="post-meta mt-4">
            <div class="meta-child">
                <span class="text-muted"><i class="bi bi-calendar3"></i> {{ $blog->created_at ? $blog->created_at->format('F j, Y') : 'N/A' }}</span>
            </div>
            <div class="meta-child">
                <span class="text-muted"><i class="bi bi-folder"></i> {{ $blog->category->category_name }}</span>
            </div>
            <div class="meta-child">
                <span class="text-muted"><i class="bi bi-person-circle"></i> {{ $blog->user->name }}</span>
            </div>
        </div>

        <div class="blog-text-content mt-4">

            {!! $blog->blog_content !!}

        </div>
    </div>

</div>