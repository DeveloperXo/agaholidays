<section id="destinations" class="destinations cards-layout mt-5">
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="title text-center">
                    <h2 class="title-h">Destinations</h2>
                    <p class="title-p">Repudiandae id, numquam necessitatibus laudantium beatae.</p>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="owl-carousel">
                <div class="item">
                    <a href="#">
                        <div class="card" style="width: 100%;">
                            <div class="img-wrap">
                                <img src="{{ asset('assets/img/banner-3.jpg') }}" class="card-img-top" alt="...">
                            </div>
                            <div class="overlay"></div>
                            <div class="card-body">
                                <h5 class="card-title">Los Angeles</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="card" style="width: 100%;">
                            <div class="img-wrap">
                                <img src="{{ asset('assets/img/banner-3.jpg') }}" class="card-img-top" alt="...">
                            </div>
                            <div class="overlay"></div>
                            <div class="card-body">
                                <h5 class="card-title">Los Angeles</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="card" style="width: 100%;">
                            <div class="img-wrap">
                                <img src="{{ asset('assets/img/banner-3.jpg') }}" class="card-img-top" alt="...">
                            </div>
                            <div class="overlay"></div>
                            <div class="card-body">
                                <h5 class="card-title">Los Angeles</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="card" style="width: 100%;">
                            <div class="img-wrap">
                                <img src="{{ asset('assets/img/banner-3.jpg') }}" class="card-img-top" alt="...">
                            </div>
                            <div class="overlay"></div>
                            <div class="card-body">
                                <h5 class="card-title">Los Angeles</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="card" style="width: 100%;">
                            <div class="img-wrap">
                                <img src="{{ asset('assets/img/banner-3.jpg') }}" class="card-img-top" alt="...">
                            </div>
                            <div class="overlay"></div>
                            <div class="card-body">
                                <h5 class="card-title">Los Angeles</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 4,
            margin: 20,
            autoWidth: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive:{
                200:{
                    items:1,
                    loop:false
                },
                1200:{
                    items:4,
                },
                992:{
                    items:3,
                },
                768:{
                    items:2,
                    loop:false
                },
            }
        });
    });
</script>