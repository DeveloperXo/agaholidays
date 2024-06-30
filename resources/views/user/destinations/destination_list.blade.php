<div class="destinations-list">
    <div class="row row-gap-3">
        <div class="col-12 col-md-4 col-lg-3 card-col">
            <a href="{{ route('user_destinations_single', 1) }}">
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



        @isset($data)
            @foreach($destinations as $d)
            <div class="col-12 col-md-4 col-lg-3 card-col">
                <a href="{{ route('user_destinations_single', $d->id) }}">
                    <div class="card" style="width: 100%;">
                        <div class="img-wrap">
                            <img src="{{ asset('storage/' . (json_decode($d->images)[0]->url ?? '')) }}" class="card-img-top" alt="{{ json_decode($d->images)[0]->caption ?? '' }}">
                        </div>
                        <div class="overlay"></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ substr($d->title ?? '', 0, 20) }}...</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        @endisset

        <div class="pagination-menu">
            {{ $destinations->links('components.pagination') }}
        </div>
    </div>
</div>