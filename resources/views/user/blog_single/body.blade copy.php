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

            <br /><br />

            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Ducimus nostrum facilis quisquam, corrupti ipsum illum eos, 
                possimus aperiam recusandae alias quibusdam sunt ipsa autem non ipsam 
                nisi officia, voluptatum obcaecati.
            </p>

            <p>
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                eu fugiat nulla pariatur.
            </p>

            <p>
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
                deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus 
                error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, 
                eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                dicta sunt explicabo.
            </p>

            <blockquote>
                <p>
                    There is nothing so useless as doing efficiently what should not be done at all!
                </p>
                <cite>— A wise man</cite>
            </blockquote>

            <p>
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
                deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus 
                error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, 
                eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                dicta sunt explicabo.
            </p>

            <h3>Why Choose Our Products</h3>

            <p>
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
                esse cillum dolore eu fugiat nulla pariatur.
            </p>
        </div>
    </div>

</div>