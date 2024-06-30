<div class="packages-list mt-4 mt-lg-0">
    <div class="card">
        <div class="row">
            <div class="col-12 col-md-4 img-col">
                <div class="img-wrap">
                    <img src="{{ asset('assets/img/banner-1.jpg') }}" class="card-img-top" alt="...">
                </div>
                <div class="img-overlay">
                    <div class="o-btns">
                        <button class="btn btn-secondary btn-sm"><i class="bi bi-camera-video"></i> View Video</button>
                        <button class="btn btn-secondary btn-sm"><i class="bi bi-image"></i> 3 Photos</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="card-body">
                    <h5 class="card-title mt-2"><a href="#">Ecotourism Sabah sight-seeing tours</a></h5>
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
                    <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam magnam, debitis mollitia optio inventore.</p>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card-body card-body-last">
                    <div class="breadcrumbs-wrap">
                        <div class="breadcrumb">
                            <span class="icon"><i class="bi bi-clock"></i></span>
                            <span class="text">4 Days</span>
                        </div>
                    </div>    
                    <div class="pricing">
                        <strong>
                            <span class="actual-price">
                                <i class="bi bi-currency-rupee"></i>
                                60,000
                            </span>
                            <br />
                            <span class="discount-price">
                                <i class="bi bi-currency-rupee"></i>
                                50,000
                            </span>
                        </strong>
                    </div>
                    <div><span class="btn btn-primary explore-btn"><a href="{{ route('user_packages_single', 1) }}">Explore</a></span></div>
                </div>
            </div>
        </div>
    </div>


    @if(!is_null($packages)) @foreach($packages as $d)
        <div class="card mt-3">
            <div class="row">
                <div class="col-12 col-md-4 img-col">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/img/'. ($d->images[0]['url'] ?? '')) }}" class="card-img-top" alt="{{ $d->images[0]['url'] }}">
                    </div>
                    <div class="img-overlay">
                        <div class="o-btns">
                            <button class="btn btn-secondary btn-sm"><i class="bi bi-camera-video"></i> View Video</button>
                            <button class="btn btn-secondary btn-sm"><i class="bi bi-image"></i> 3 Photos</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="card-body">
                        <h5 class="card-title mt-2"><a href="{{ $d->id }}">{{ $d->package_name }}</a></h5>
                        <div class="package-location">
                            <span class="icon"><i class="bi bi-geo-alt &nbsp;&nbsp;"></i></span>
                            <span class="location">{{ $d->package_location }}</span>
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
                        <p class="card-text">{{ $d->intro_text }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card-body card-body-last">
                        <div class="breadcrumbs-wrap">
                            @foreach($d->tags as $t)
                                <div class="breadcrumb">
                                    <span class="icon">{!! $t['icon'] ?? '' !!}</span>
                                    <span class="text">{{ $t['text'] ?? '' }}</span>
                                </div>
                            @endforeach
                        </div>    
                        <div class="pricing">
                            <strong>
                                @if ($d->actual_price)
                                <span class="actual-price">
                                    <i class="bi bi-currency-rupee"></i>
                                    {{ $d->actual_price }}
                                </span>
                                @endif
                                <br />
                                <span class="discount-price">
                                    <i class="bi bi-currency-rupee"></i>
                                    {{ $d->payable_price }}
                                </span>
                            </strong>
                        </div>
                        <div><span class="btn btn-primary explore-btn"><a href="{{ route('user_packages_single', $d->id) }}">Explore</a></span></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach @endif


</div>