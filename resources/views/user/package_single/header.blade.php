<section id="package-single-header" class="package-single-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-box">
                    <h5 class="title">Ecotourism Sabah sight-seeing tours  Sabah sight-seeing tours</h5>
                    <div class="h-btns">
                        <button class="btn btn-secondary"><i class="bi bi-camera-video"></i> View Video</button>
                        <button class="btn btn-secondary"><i class="bi bi-image"></i> 3 Photos</button>
                    </div>
                </div>
                <div class="location-and-review-box">
                    <div class="package-location">
                        <span class="icon"><i class="bi bi-geo-alt &nbsp;&nbsp;"></i></span>
                        <span class="location">Sabah, Malaysia</span>
                    </div>
                    <div class="package-review">
                        <span class="icon">
                            <i class="bi bi-star-fill &nbsp;&nbsp;"></i>
                            <i class="bi bi-star-fill &nbsp;&nbsp;"></i>
                            <i class="bi bi-star-fill &nbsp;&nbsp;"></i>
                            <i class="bi bi-star-fill &nbsp;&nbsp;"></i>
                            <i class="bi bi-star-fill &nbsp;&nbsp;"></i>
                        </span>
                        <span class="review-count">(5 reviews)</span>
                    </div>
                </div>
                <div class="package-gallery">
                    <div class="owl-carousel">
                        <div class="item">
                            <img src="{{ asset('assets/img/banner-1.jpg') }}" alt="...">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/banner-3.jpg') }}" alt="...">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/banner-2.jpg') }}" alt="...">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/banner-4.jpg') }}" alt="...">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/banner-4.jpg') }}" alt="...">
                        </div>
                    </div>
                </div>
                <div class="package-breadcrumbs">
                    <div class="breadcrumb">
                        <div class="icon"><i class="bi bi-calendar3"></i></div>
                        <div class="text">
                            <span class="title">Duration</span>
                            <span class="answer">2 hours</span>
                        </div>
                    </div>
                    <div class="breadcrumb">
                        <div class="icon"><i class="bi bi-people"></i></div>
                        <div class="text">
                            <span class="title">Max People</span>
                            <span class="answer">20</span>
                        </div>
                    </div>
                    <div class="breadcrumb">
                        <div class="icon"><i class="bi bi-person-lock"></i></div>
                        <div class="text">
                            <span class="title">Min Age</span>
                            <span class="answer">3+</span>
                        </div>
                    </div>
                    <div class="breadcrumb">
                        <div class="icon"><i class="bi bi-geo-alt"></i></div>
                        <div class="text">
                            <span class="title">Pickup</span>
                            <span class="answer">Bus</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 4,
            loop: true,
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