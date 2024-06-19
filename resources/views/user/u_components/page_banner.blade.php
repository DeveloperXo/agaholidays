<section id="banner-{{ $meta['title'] ?? 'z' }}" class="banner">
    <div class="container" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url('{{ $data['banner_image'] ?? asset('assets/img/banner-4.jpg') }}');">
        <div class="row">
            <div class="col col-12">
                <div class="banner-content text-center">
                    <h2 class="banner-title">{{ $data['banner_title'] ?? '' }}</h2>
                    <p class="banner-text">{{ $data['banner_text'] ?? '' }}
                </div>
            </div>
        </div>
    </div>
</section>