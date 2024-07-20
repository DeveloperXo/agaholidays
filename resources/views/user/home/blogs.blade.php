<section id="blogs" class="blogs cards-layout mt-5">
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="title text-center">
                    <h2 class="title-h">Blogs</h2>
                    <p class="title-p">Find travel tips and stories from around the world.</p>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            @foreach($blogs as $d)
                <div class="col-12 col-lg-4 col-md-6 mt-3">
                    <a href="{{ route('user_blogs_single', $d->id) }}">
                        <div class="card" style="width: 100%;">
                            <div class="img-wrap">
                                <img src="{{ asset('storage/'.$d->featured_image) }}" class="card-img-top" alt="{{ $d->blog_title }}">
                            </div>
                            <div class="card-body">
                                <div class="card-meta">
                                    <span class="meta-child category text-muted">
                                        <i class="bi bi-folder"></i>&nbsp;&nbsp;{{ $d->category->category_name }}
                                    </span>
                                    <span class="meta-child date text-muted">
                                        <i class="bi bi-calendar3"></i>&nbsp;&nbsp;{{ $d->created_at ? $d->created_at->format('F j, Y') : 'N/A' }}
                                    </span>
                                    <span class="meta-child author text-muted">
                                        <i class="bi bi-person-circle"></i>&nbsp;&nbsp;{{ $d->user->name }}
                                    </span>
                                </div>
                                <h5 class="card-title mt-2">{{ $d->blog_title }}</h5>
                                <p class="card-text"> 
                                    {{ $d->intro_text }}
                                </p>
                                    
                                <div class="read-more">
                                    <span>Read more</span> &nbsp;
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>