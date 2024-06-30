<x-admin-master-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="pagetitle">
        <h1>{{ isset($data) ? $data->title : 'New Destination' }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_destinations.view_all') }}">Destinations</a></li>
                <li class="breadcrumb-item active">{{ isset($data) ? $data->title : 'New' }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($data) ? 'Edit '.$data->title : 'Create new Destination' }}</h5>

                        <form id="destinationForm" class="row g-3" method="POST" action="{{ isset($data) ? route('admin_destinations.update_update', $data->id) : route('admin_destinations.create_create') }}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($data))
                                @method('PUT')
                            @else 
                                @method('POST')
                            @endif

                            <div class="error-msgs">
                                @foreach ($errors->all() as $error)
                                    <ul>
                                        <li class="text-danger">{{ $error }}</li>
                                    </ul>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $data->title ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Text</label>
                                <input type="text" class="form-control" id="text" name="text" value="{{ $data->text ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="overview" class="form-label">Overview</label>
                                <textarea class="form-control" id="overview" name="overview" rows="3" required>{{ $data->overview ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="info" class="form-label">Info</label>
                                <textarea class="form-control" id="info" name="info" rows="3" required>{{ $data->info ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tour Details</label>
                                @if(isset($data)) 
                                <div id="tour-details-container">
                                    @foreach(json_decode($data->tour_details) as $i=>$d)
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" name="tour_details[{{ $i }}][title]" value="{{ $d->title ?? '' }}" placeholder="Title">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="tour_details[{{ $i }}][text]" value="{{ $d->text ?? '' }}" placeholder="Text">
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                @else
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" name="tour_details[0][title]" placeholder="Title">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="tour_details[0][text]" placeholder="Text">
                                        </div>
                                    </div>
                                    <div id="tour-details-container"></div>
                                @endif 
                                <button type="button" class="btn btn-primary" id="add-tour-detail">Add Tour Detail</button>
                            </div>
                            <div class="mb-3">
                                <label for="map" class="form-label">Map</label>
                                <input type="text" class="form-control" id="map" name="map" value="{{ $data->map ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Images (Add minimum of 3 images)</label>
                                @if(!isset($data))
                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="file" class="form-control" name="images[0][file]" accept="image/*" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="images[0][caption]" placeholder="Caption" required>
                                    </div>
                                </div>
                                @endif
                                <div id="images-container"></div>
                                <button type="button" class="btn btn-primary" id="add-image">Add Image</button>

                                @isset($data)
                                    <div class="row mt-3">
                                        <p><i>Destination Images:</i></p>
                                        @foreach(json_decode($data->images) as $d)
                                            <div class="col-12 col-sm-3">
                                                <img src="{{ asset('storage/'. $d->url) }}" alt="" class="w-100">
                                            </div>
                                        @endforeach
                                    </div>
                                @endisset
                            </div>
                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" value="{{ $data->meta_title ?? '' }}" name="meta_title">
                            </div>
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <input type="text" class="form-control" id="meta_description" value="{{ $data->meta_description ?? '' }}" name="meta_description">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">{{ isset($data) ? 'Save' : 'Create' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            let tourDetailCount = 1;
            $('#add-tour-detail').click(function() {
                $('#tour-details-container').append(`
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" name="tour_details[${tourDetailCount}][title]" placeholder="Title">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="tour_details[${tourDetailCount}][text]" placeholder="Text">
                        </div>
                    </div>
                `);
                tourDetailCount++;
            });

            let imageCount = 1;
            $('#add-image').click(function() {
                $('#images-container').append(`
                    <div class="row mb-3">
                        <div class="col">
                            <input type="file" class="form-control" name="images[${imageCount}][file]" accept="image/*" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="images[${imageCount}][caption]" placeholder="Caption" required>
                        </div>
                    </div>
                `);
                imageCount++;
            });
        });
    </script>
</x-admin-master-layout>