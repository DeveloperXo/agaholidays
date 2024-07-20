<div class="destination-single-body">
    <div class="blog-text">
        
        <h3>Overview</h3>

        <p>
            {!! $destination->overview !!}
        </p>


        <h3 class="mt-5">Sights</h3>

        <div class="gallery">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="img-wrap h-100 mb-3 mt-md-0">
                        <img src="{{ asset('storage/'. (json_decode($destination->images)[0]->url ?? '')) }}" alt="{{ json_decode($destination->images)[0]->caption ?? '' }}">
                    </div>
                </div>
                <div class="col-12 col-md-4 mt-3 mt-md-0">
                    <div class="img-wrap">
                    <img src="{{ asset('storage/'. (json_decode($destination->images)[1]->url ?? '')) }}" alt="{{ json_decode($destination->images)[1]->caption ?? '' }}">
                    </div>
                    <div class="img-wrap mt-3 mt-md-2 overlay-wrap">
                        @if (count(json_decode($destination->images)) - 2 > 0)
                        <img src="{{ asset('storage/'. (json_decode($destination->images)[2]->url ?? '')) }}" alt="{{ json_decode($destination->images)[2]->caption ?? '' }}">
                            <div class="overlay">
                                <p class="overlay-text">+{{ count(json_decode($destination->images)) - 2 }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{--<!-- Destination Map -->
        <div class="destination-map">
            <h3 class="title mt-5">Map</h3>
            <div class="map-container">
                <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423286.88292439276!2d-118.7413927827075!3d34.02003921253605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sin!4v1718447223133!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>--}}

        <h3 class="mt-5">Info</h3>

        <p>
            {!! $destination->info !!}
        </p>
    </div>

    <div id="map"></div>

    <script>
        let map;

        async function initMap() {
            const { Map } = await google.maps.importLibrary("maps");

            map = new Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8,
            });
        }

        initMap();
    </script>

</div>