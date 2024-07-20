<section id="package-single-header" class="package-single-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-box">
                    <h5 class="title">{{ $package->package_name }}</h5>
                    <div class="h-btns">
                        @isset($d->video) <button class="btn btn-secondary"><i class="bi bi-camera-video"></i> View Video</button> @endisset
                        <button class="btn btn-secondary show_package_images_btn" data-images="{{ $package->images ?? json_encode([]) }}" data-path="{{ asset('storage/') }}">
                            <i class="bi bi-image"></i> {{ count(json_decode($package->images)) }} Photos
                        </button>
                    </div>
                </div>
                <div class="location-and-review-box">
                    <div class="package-location">
                        <span class="icon"><i class="bi bi-geo-alt &nbsp;&nbsp;"></i></span>
                        <span class="location">{{ $package->country }}, {{ $package->city }}</span>
                    </div>
                    <div class="package-category">
                        <span class="icon"><i class="bi bi-folder &nbsp;&nbsp;"></i></span>
                        <span class="category">{{ $package->category->category_name }}</span>
                    </div>
                    {{--<div class="package-review">
                        <span class="icon">
                            <i class="bi bi-star-fill &nbsp;&nbsp;"></i>
                            <i class="bi bi-star-fill &nbsp;&nbsp;"></i>
                            <i class="bi bi-star-fill &nbsp;&nbsp;"></i>
                            <i class="bi bi-star-fill &nbsp;&nbsp;"></i>
                            <i class="bi bi-star-fill &nbsp;&nbsp;"></i>
                        </span>
                        <span class="review-count">(5 reviews)</span>
                    </div>--}}
                </div>
                <div class="package-gallery">
                    <div class="spotlight-group">
                        <div class="owl-carousel">
                            @isset($package->images) @foreach(json_decode($package->images) as $d)
                                <div class="item">
                                    <a class="spotlight" href="{{ asset('storage/'.($d->url ?? '')) }}" data-theme="dark">
                                        <img src="{{ asset('storage/'.($d->url)) }}">
                                    </a>
                                </div>
                            @endforeach @endisset
                        </div>
                    </div>
                </div>
                <div class="package-breadcrumbs">
                    @isset($package->infos) @foreach(json_decode($package->infos) as $d)
                        <div class="breadcrumb">
                            <div class="icon">{!! $d->icon ?? '' !!}</div>
                            <div class="text">
                                <span class="title">{{ $d->title ?? '' }}</span>
                                <span class="answer">{{ $d->text ?? '' }}</span>
                            </div>
                        </div>
                    @endforeach @endisset
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 4,
            loop: false,
            dots: true,
            nav: false,
            margin: 20,
            autoWidth: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                200: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 3,
                },
            }
        });
    });
</script>