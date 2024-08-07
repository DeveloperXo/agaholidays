<div class="blogs-sidebar mt-4 mt-md-0">
    <div class="card-body">
        <div class="search-container">
            <form action="{{ route('user_filter_blogs') }}" class="search-form">
                <div class="input-group">
                    <input type="text" class="form-control" name="blog_title" placeholder="Search">
                    <span class="input-group-text">
                        <button class="btn p-0"><i class="bi bi-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <div class="card card-list card-categories mt-4">
        <div class="card-header">
            <h4 class="card-title m-0"><i class="bi bi-folder"></i> Categories</h4>
        </div>
        <div class="card-body">
            <div class="list-items">
                <ul class="cat-ul">
                    @isset($categories) @foreach($categories as $d)
                        <li>
                            <div class="title">
                                <i class="bi bi-chevron-right"></i> 
                                <a href="{{ route('user_filter_blogs') }}/?{{ 'category_id[]='.$d->id }}">{{ $d->category_name }}</a>
                            </div>
                            <div class="content"></div>
                        </li>
                    @endforeach @endisset
                </ul>
            </div>
        </div>
    </div>

    {{--<div class="card card-list card-categories mt-4">
        <div class="card-header">
            <h4 class="card-title m-0"><i class="bi bi-star"></i> More like this</h4>
        </div>
        <div class="card-body">
            <div class="list-items">
                <ul class="popular-post-ul">
                    @isset($blogs) @foreach($blogs as $d)
                        <li>
                            <div class="post-wrap">
                                <div class="post-img">
                                    <img src="{{ asset('storage/'.$d->featured_image) }}" alt="">
                                </div>
                                <div class="post-content">
                                    <h4 class="post-title"><a href="{{ route('user_blogs_single', $d->id) }}">{{ $d->blog_title }}</a></h4>
                                    <p class="post-date text-muted m-0">{{ $d->created_at ? $d->created_at->format('F j, Y') : 'N/A' }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach @endisset
                </ul>
            </div>
        </div>
    </div>--}}

    {{--<div class="card card-list card-tags mt-4">
        <div class="card-header">
            <h4 class="card-title m-0"><i class="bi bi-tags"></i> Tags</h4>
        </div>
        <div class="card-body">
            <div class="list-items">
                <ul class="tag-ul">
                    <li>
                        <div class="boxed"><a href="#">Place</a></div>
                    </li>
                    <li>
                        <div class="boxed"><a href="#">Story</a></div>
                    </li>
                    <li>
                        <div class="boxed"><a href="#">Travel</a></div>
                    </li>
                    <li>
                        <div class="boxed"><a href="#">Backpacking Clothes</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>--}}
</div>