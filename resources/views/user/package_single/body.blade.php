<div class="package-single-body">
    <div class="blog-text">
        
        {!! $package->body_text !!}

        <h1>Included/Excluded</h1>

        <!-- This will not be included in plain text but instead there will be additional option to add
            included and excluded items and this will be saved in database
        -->
        <div class="included-excluded mb-5">
            <div class="items-included">

                @isset($package->included_excluded['included'])  @foreach($package->included_excluded['included'] as $d)
                    <div class="item">
                        <span class="icon"><i class="bi bi-check-circle"></i></span>
                        <span class="text">{!! $d['text'] !!}</span>

                    </div>
                @endforeach  @endisset
            </div>
            <div class="items-excluded">
                @isset($package->included_excluded['included'])  @foreach($package->included_excluded['excluded'] as $d)
                    <div class="item">
                        <span class="icon"><i class="bi bi-x-circle"></i></span>
                        <span class="text">{!! $d['text'] !!}</span>
                    </div>
                @endforeach  @endisset
            </div>
        </div>

    </div>

    <hr />

    <!-- Tour Plan -->
    <div class="tour-plan mb-5">
        <h3 class="title">Tour Plan</h3>

        @isset($package->tour_plan) @foreach($package->tour_plan as $i=>$d)
            <div class="accordion {{ $i > 0 ? 'my-3' : '' }}" id="package_single_{{ $i }}">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapseOne">
                            <div class="btn-txts">
                                <div class="btn-title"><span>{{ $d['main_title'] ?? '' }}</span></div>
                                <div class="btn-txt"><span>{{ $d['sub_title'] ?? '' }}</span></div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapse{{ $i }}" class="accordion-collapse collapse" >
                        <div class="accordion-body">
                            <p class="acc-text">
                                {!! $d['body'] ?? '' !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach @endisset
    </div>

    <hr />

    <!-- Tour Map -->
    <div class="tour-map">
        <h3 class="title">Tour Map</h3>
        <div class="map-container">
            <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423286.88292439276!2d-118.7413927827075!3d34.02003921253605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sin!4v1718447223133!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>