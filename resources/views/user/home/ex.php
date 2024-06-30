@vite(['resources/css/home.css'])
<section class="hero-section">
    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel carousel-fade">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/banner-1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/banner-2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/banner-3.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Slider Overlay -->
    <div class="slider-overlay-wrap">
        <div class="container">
            <div class="row">
                <div class="col col-left">
                    <h3 class="text-white">Discover Your Next Great Adventure</h3>
                    <h1 class="text-white">Your Dream Vacation Starts Here!</h2>
                    <p class="text-white">
                        Discover amazing places and unforgettable adventures with our 
                        travel guides. Whether you want to relax on a beach, explore a new 
                        city, or hike through nature, we have the perfect trip for you. Start 
                        planning your dream vacation today and experience the world 
                        like never before.
                    </p>
                </div>
                <div class="col col-right">
                    hello2
                </div>
            </div>
        </div>
    </div>
</section>

<x-master-layout>
    <!--Lead-->
    @include('user.home.lead')
</x-master-layout>

/* Hero Section */

.hero-section {
    position: relative;
}

.hero-section .carousel {
    height: 80vh;
    overflow: hidden;
}

.hero-section .carousel .carousel-inner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    /* display: none; */
}

.hero-section .carousel .carousel-inner,
.hero-section .carousel .carousel-item {
    height: 100%;
}

.hero-section .carousel .carousel-control-prev,
.hero-section .carousel .carousel-control-next {
    /* height: 80vh; */
    display: none;
}

.hero-section .slider-overlay-wrap {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    background-color: rgba(0, 0, 0, 0.521);
    display: flex;
    justify-content: center;
    align-items: center;
} 

.hero-section .slider-overlay-wrap .col{
    height: 100%;
}

/* .hero-section .slider-overlay-wrap .col.col-left { background-color: aliceblue; } */
.hero-section .slider-overlay-wrap .col.col-right { background-color: rgb(124, 149, 172); }