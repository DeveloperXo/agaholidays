<section id="packages" class="packages cards-layout mt-5">
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="title text-center">
                    <h2 class="title-h">Packages</h2>
                    <p class="title-p">Explore our curated travel packages for unforgettable adventures.</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            @isset($packages) @foreach($packages as $d)
            <div class="col-12 col-lg-6 col-xl-3 col-md-6 mt-3">
                <a href="{{ route('user_packages_single', $d->id) }}">
                    <div class="card" style="width: 100%;">
                        <div class="img-wrap">
                            <img src="{{ asset('storage/'. (json_decode($d->images)[0]->url ?? '')) }}" class="card-img-top" alt="{{ json_decode($d->images)[0]->caption }}">
                        </div>
                        <div class="card-body">
                            <div class="breadcrumb-wrap">
                                @isset($d->tags) @foreach(json_decode($d->tags) as $t) 
                                    <div class="breadcrumb">
                                        <span class="icon">{!! $t->icon !!}</span>
                                        &nbsp;
                                        <span class="text">{{ $t->text ?? '' }}</span>
                                    </div>
                                @endforeach @endisset
                            </div>
                            <h5 class="card-title mt-2">{{ $d->package_name }}</h5>
                            <div class="package-location">
                                <span class="icon"><i class="bi bi-geo-alt &nbsp;&nbsp;"></i></span>
                                <span class="location">{{ $d->country }}, {{ $d->city }}</span>
                            </div>
                            <p class="card-text"></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="pricing">
                                    <span class="text-small">Starting from</span> <br/>
                                    <strong>
                                        {{--<span class="actual-price">
                                            <i class="bi bi-currency-rupee"></i>
                                            {{ $d->actual_price }}
                                        </span>
                                        <br />--}}
                                        <span class="discount-price">
                                            <i class="bi bi-currency-rupee"></i>
                                            <span class="format-price" data-value="{{ $d->starting_price }}">
                                                {{ $d->starting_price }}
                                            </span>
                                        </span>
                                    </strong>
                                </span>
                                <div><span class="btn btn-secondary">Explore</span></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach @endisset
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('user_packages') }}" class="btn btn-primary">Get Started</a>
        </div>
    </div>
</section>