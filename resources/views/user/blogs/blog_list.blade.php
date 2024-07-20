<div class="blogs-page cards-layout mt-4 mt-lg-0">
    <div class="row row-gap-3">
        @if(!$blogs->isEmpty()) @foreach($blogs as $d)
            <div class="col-12 col-md-6">
                <a href="{{ route('user_blogs_single', $d->id) }}">
                    <div class="card" style="width: 100%;">
                        <div class="img-wrap">
                            <img src="{{ asset('storage/'.$d->featured_image) }}" class="card-img-top" alt="{{ $d->blog_title }}">
                        </div>
                        <div class="card-body">
                            <div class="card-meta">
                                <span class="meta-child category text-muted">
                                    <i class="bi bi-folder"></i>&nbsp;&nbsp; {{ $d->category->category_name }}
                                </span>
                                <span class="meta-child date text-muted">
                                    <i class="bi bi-calendar3"></i>&nbsp;&nbsp; {{ $d->created_at ? $d->created_at->format('F j, Y') : 'N/A' }}
                                </span>
                                <span class="meta-child author text-muted">
                                    <i class="bi bi-person-circle"></i>&nbsp;&nbsp; {{ $d->user->name }}
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
        @else
            @include('user.u_components.no_results')
        @endif
        <div class="pagination-menu">
            {{ $blogs->links('components.pagination') }}
        </div>
    </div>
</div>
