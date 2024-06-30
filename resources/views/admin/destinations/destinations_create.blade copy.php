<x-admin-master-layout>
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
                            
                            <div class="col-12">
                                <label for="title" class="form-label">Destination Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $data->title ?? '' }}">
                            </div>

                            <div class="col-12">
                                <label for="text" class="form-label">Intro text</label>
                                <input type="text" class="form-control" id="text" name="text" value="{{ $data->text ?? '' }}">
                            </div>

                            <!-- Quill Editor Default -->
                            <div class="col-12 mb-5">
                                <p class="mb-2">Overview text</p>

                                <div id="overviewTextEditor">
                                   {!! $data->blog_content ?? '' !!}
                                </div>

                                <p class="mt-3 mb-2">Info text</p>
                                <div>

                                    <div id="infoTextEditor">
                                       {!! $data->blog_content ?? '' !!}
                                    </div>
                                </div>
                            </div>
                            <!-- End Quill Editor Default -->

                            <input type="hidden" name="overview" id="hidden-overview-text">
                            <input type="hidden" name="info" id="hidden-info-text">

                            <div class="mt-5"></div>
                            <div class="mt-5"></div>
                            <div class="mt-5"></div>

                            <div class="col-12 mt-5">
                                <label for="images" class="form-label">Images</label>
                                
                                <div id="imageFieldsContainer">
                                    <div class="mb-3">
                                        <input type="file" class="form-control mb-2" name="images_[]">
                                        <input type="text" class="form-control" name="captions_[]" placeholder="Caption">
                                    </div>
                                    
                                </div>
                                
                                @if(isset($data))
                                    <div class="banner-img mt-4 col-12 col-md-3">
                                        <h6><i>Current images:</i></h6>
                                        {{-- @foreach(json_decode($data->images) as $d)
                                            <img src="{{ asset('storage/'.($d['url'] ?? '')) }}" alt="{{ $d['caption'] ?? 'Image' }}" class="w-100 h-100 rounded" style="object-fit:cover;">
                                        @endforeach --}}
                                    </div>
                                    <input type="hidden" name="images" id="images-input-toUpdate" value="{{ '[]' }}">
                                    @php print_r($data->images) @endphp
                                @else
                                    <input type="hidden" name="images" id="images-input-toCreate">
                                @endif
                                <button type="button" class="btn btn-primary btn-sm mt-3" onclick="addField('imageFieldsContainer', ['images_[]', 'captions_[]'], ['file', 'text'], ['form-control mb-2', 'form-control'])">Add More</button>
                            </div>


                            <div class="col-12 mt-5">
                                <label for="titles_and_texts" class="form-label">Tour Details</label>
                                
                                <div id="titleTextFieldsContainer">
                                    @if(isset($data)) @foreach(json_decode($data->tour_details) as $d)
                                        <div class="mb-3">
                                            <input type="text" class="form-control mb-2 fw-bold" name="titles[]" placeholder="Title" value="{{ $d->title ?? '' }}">
                                            <input type="text" class="form-control mb-3" name="texts[]" placeholder="Value" value="{{ $d->text ?? '' }}">
                                        </div>
                                    @endforeach @else
                                        <div class="mb-3">
                                            <input type="text" class="form-control mb-2 fw-bold" name="titles[]" placeholder="Title" >
                                            <input type="text" class="form-control" name="texts[]" placeholder="Value">
                                        </div>
                                    @endisset
                                </div>

                                <button type="button" class="btn btn-primary btn-sm mt-3" onclick="addField('titleTextFieldsContainer', ['titles[]', 'texts[]'], ['text', 'input'], ['form-control mb-2 fw-bold', 'form-control mb-3'])">Add More</button>
                                <input type="hidden" name="tour_details" id="tour-details-input">
                            </div>

                            <div class="col-12">
                                <h5 class="mt-5"><i>SEO :-</i></h5>
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $data->meta_title ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <input type="text" class="form-control" id="meta_description" name="meta_description">{{ $data->meta_description ?? '' }}</input>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">{{ isset($data) ? 'Save' : 'Create' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quill_overview = new Quill('#overviewTextEditor', {
                theme: 'snow',
                placeholder: 'Compose...',
                modules: {
                    toolbar: true,
                }
            });
            const quill_info = new Quill('#infoTextEditor', {
                theme: 'snow',
                placeholder: 'Compose...',
                modules: {
                    toolbar: true,
                }
            });
            
            const form = document.querySelector('#destinationForm');
            const overviewTextInput = document.querySelector('#hidden-overview-text');
            const infoTextInput = document.querySelector('#hidden-info-text');
            const imagesInput_toCreate = document.querySelector('#images-input-toCreate')
            const imagesInput_toUpdate = document.querySelector('#images-input-toUpdate')
            const tourDetailsInput = document.querySelector('#tour-details-input')
            form.addEventListener('submit', function(e) {
                // e.preventDefault()
                overviewTextInput.value = quill_overview.root.innerHTML;
                infoTextInput.value = quill_info.root.innerHTML;
                const images = [];
                document.querySelectorAll('#imageFieldsContainer div').forEach(div => {
                    const image = div.querySelector('input[name="images[]"]').files[0];
                    const caption = div.querySelector('input[name="captions[]"]').value;
                    if (image) {
                        images.push({ url: URL.createObjectURL(image), caption });
                    }
                });
                if (imagesInput_toCreate) {
                    imagesInput_toCreate.value = images;
                } else {
                    let old_value = JSON.parse(imagesInput_toUpdate.value);
                    images.forEach(e => {old_value.push(e)});
                    imagesInput_toUpdate.value = JSON.stringify(old_value);
                }

                const tourDetails = [];
                document.querySelectorAll('#titleTextFieldsContainer div').forEach(div => {
                    console.log(div)
                    const title = div.querySelector('input[name="titles[]"]').value;
                    const text = div.querySelector('input[name="texts[]"]').value;
                    if (title && text) {
                        tourDetails.push({ title, text });
                    }
                });
                tourDetailsInput.value = JSON.stringify(tourDetails);
            });
        });

        function addField(containerId, names, types, classes) {
            var newDiv = document.createElement("div");
            newDiv.classList.add("mb-3");

            for (var i = 0; i < names.length; i++) {
                var newInput;
                if (types[i] === 'input') {
                    newInput = document.createElement("input");
                } else {
                    newInput = document.createElement("input");
                    newInput.type = types[i];
                }
                newInput.name = names[i];
                newInput.className = classes[i];
                if (types[i] !== 'file') {
                    newInput.placeholder = names[i].charAt(0).toUpperCase() + names[i].slice(1).replace('[]', '');
                }
                newDiv.appendChild(newInput);
            }
            document.getElementById(containerId).appendChild(newDiv);
        }
    </script>
</x-admin-master-layout>