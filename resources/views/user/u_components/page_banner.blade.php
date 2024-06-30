<section id="banner-{{ $meta->page_title ?? 'z' }}" class="banner">
    <div class="container" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url('{{ asset('storage/' . ($meta->banner_image ?? '')) }}');">
        <div class="row">
            <div class="col col-12 col-md-9 mx-auto">
                <div class="banner-content text-center">
                    <h2 class="banner-title">{{ $meta->banner_title ?? '' }}</h2>
                    <p class="banner-text">{{ $meta->banner_text ?? '' }}
                </div>
            </div>
        </div>
    </div>
</section>