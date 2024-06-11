<section id="top" class="lead">
    <!-- Slider -->
    <div id="leadCarousel" class="carousel carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#leadCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#leadCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#leadCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/banner-1.jpg') }}" class="d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/banner-2.jpg') }}" class="d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/banner-3.jpg') }}" class="d-block" alt="...">
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-12 col-left">
                    <h3>Discover Your Next Great Adventure</h3>
                    <h1>Your Dream Vacation <br /> Starts Here!</h1>
                    <p>
                        Discover amazing places and unforgettable adventures with our 
                        travel guides. Whether you want to relax on a beach, explore a new 
                        city, or hike through nature, we have the perfect trip for you. Start 
                        planning your dream vacation today and experience the world 
                        like never before.
                    </p>

                    <div class="search-bar-container mt-4">
                        <div class="col col-md-5 col-12">
                            <div class="search-bar">
                                <input type="text" class="form-control search-input" placeholder="Search your destination" />
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>