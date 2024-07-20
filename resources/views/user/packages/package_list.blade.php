<div class="packages-list mt-4 mt-lg-0">
    @if(!$packages->isEmpty()) @foreach($packages as $i=>$d)
        <div class="card {{ $i == 0 ? '' : 'mt-3' }}">
            <div class="row">
                <div class="col-12 col-md-4 img-col">
                    <div class="img-wrap">
                        <img src="{{ asset('storage/'. (json_decode($d->images)[0]->url ?? '')) }}" class="card-img-top" alt="{{ json_decode($d->images)[0]->caption }}">
                    </div>
                    <div class="img-overlay">
                        <div class="o-btns">
                            @if($d->video) <button class="btn btn-secondary btn-sm"><i class="bi bi-camera-video"></i> View Video</button> @endif
                            <button class="btn btn-secondary btn-sm show_package_images_btn" data-images="{{ $d->images ?? json_encode([]) }}" data-path="{{ asset('storage/') }}">
                                <i class="bi bi-image"></i> {{ count(json_decode($d->images)) }} Photos
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="card-body">
                        <h5 class="card-title mt-2"><a href="{{ route('user_packages_single', $d->id) }}">{{ $d->package_name }}</a></h5>
                        <div class="package-location">
                            <span class="icon"><i class="bi bi-geo-alt &nbsp;&nbsp;"></i></span>
                            <span class="location">{{ $d->country }}, {{ $d->city }}</span>
                            &nbsp;&nbsp;
                            <span class="icon text-dark"><i class="bi bi-folder &nbsp;&nbsp;"></i></span>
                            <span class="category">{{ $d->category->category_name }}</span>
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
                        <p class="card-text">{{ $d->intro_text }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card-body card-body-last">
                        <div class="breadcrumbs-wrap">
                            @foreach(json_decode($d->tags) as $t)
                                <div class="breadcrumb">
                                    <span class="icon">{!! $t->icon ?? '' !!}</span>
                                    <span class="text">{{ $t->text ?? '' }}</span>
                                </div>
                            @endforeach
                        </div>    
                        <div class="pricing">
                            <strong>
                                {{--@if ($d->actual_price)
                                <span class="actual-price">
                                    <i class="bi bi-currency-rupee"></i>
                                    {{ $d->actual_price }}
                                </span>
                                @endif--}}
                                <br />
                                <span class="text-small">Starting from</span>
                                <br />
                                <span class="discount-price">
                                    <i class="bi bi-currency-rupee"></i>
                                    <span class="format-price" data-value="{{ $d->starting_price }}">{{ $d->starting_price }}</span>
                                </span>
                            </strong>
                        </div>
                        <div><a href="{{ route('user_packages_single', $d->id) }}"><span class="btn btn-primary explore-btn">Explore</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach 
    @else
        @include('user.u_components.no_results')
    @endif
</div>