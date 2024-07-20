<x-admin-master-layout>
    <div class="pagetitle">
        <h1>{{ isset($data) ? $data->package_name : 'New Package' }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_packages.view_all') }}">Packages</a></li>
                <li class="breadcrumb-item active">{{ isset($data) ? $data->package_name : 'New' }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($data) ? 'Edit '.$data->package_name : 'Create new Package' }}</h5>

                        <form id="packageCreateForm" class="row g-3" method="POST" action="{{ isset($data) ? route('admin_packages.update_update', $data->id) : route('admin_packages.create_create') }}" enctype="multipart/form-data">
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
                                <label for="package-name" class="form-label">Package Name</label>
                                <input type="text" class="form-control" id="package-name" name="package_name" value="{{ $data->package_name ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="intro-text" class="form-label">Intro Text</label>
                                <input type="text" class="form-control" id="intro-text" name="intro_text" value="{{ $data->intro_text ?? '' }}" placeholder="Around 150 characters..." required>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="city" class="form-label">City</label>
                                        <select name="city" id="city" class="form-select">
                                            <option value="">Select a city</option>
                                            @isset($cities) @foreach($cities as $d)
                                                <option value="{{ $d->city_name }}" {{ isset($data) && $d->city_name === $data->city ? 'selected=selectde' : '' }}>{{ $d->city_name }}</option>
                                            @endforeach @endisset
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="country" class="form-label">Country</label>
                                        <select name="country" id="country" class="form-select">
                                            <option value="">Select a country</option>
                                            @isset($countries) @foreach($countries as $d)
                                                <option value="{{ $d->country_name }}" {{ isset($data) && $d->country_name === $data->country ? 'selected=selectde' : '' }}>{{ $d->country_name }}</option>
                                            @endforeach @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="starting-price" class="form-label">Starting Price</label>
                                        <input type="number" class="form-control" id="starting-price" name="starting_price" value="{{ $data->starting_price ?? '' }}" required>
                                    </div>
                                    <div class="col">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-select" required>
                                            <option value="">Select Category</option>
                                            @isset($categories) @foreach($categories as $d)
                                                <option value="{{ $d->id }}" {{ isset($data) && $data->category_id === $d->id ? 'selected=selected' : '' }}>{{ $d->category_name }}</option>
                                            @endforeach @endisset
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="duration" class="form-label">Duration Type</label>
                                        <select name="duration" id="duration" class="form-select" required>
                                            <option value="">Select Duration</option>
                                            <option value="0-3h" {{ isset($data) && $data->duration === '0-3h' ? 'selected=selected' : '' }}>0 - 3 hours</option>
                                            <option value="3-5h" {{ isset($data) && $data->duration === '3-5h' ? 'selected=selected' : '' }}>3 - 5 hours</option>
                                            <option value="5-7h" {{ isset($data) && $data->duration === '5-7h' ? 'selected=selected' : '' }}>5 - 7 hours</option>
                                            <option value="plus7h" {{ isset($data) && $data->duration === 'plus7h' ? 'selected=selected' : '' }}>+7 hours</option>
                                            <option value="1-3d" {{ isset($data) && $data->duration === '1-3d' ? 'selected=selected' : '' }}>1 - 3 days</option>
                                            <option value="plus3d" {{ isset($data) && $data->duration === 'plus3d' ? 'selected=selected' : '' }}>+3 days</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Body Text</label>
                                <div id="packageBodyTextEditor">
                                   {!! $data->body_text ?? '' !!}
                                </div>
                                <input type="hidden" id="packageBodyHiddenInput" name="body_text" />
                            </div>
                            <div class="mb-5"></div>

                            <div class="mb-3">
                                <label class="form-label">Package Info</label>
                                @if(isset($data)) 
                                <div id="infos-container">
                                    @foreach(json_decode($data->infos) as $i=>$d)
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" name="infos[{{ $i }}][icon]" value="{{ $d->icon ?? '' }}" placeholder="Icon">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="infos[{{ $i }}][title]" value="{{ $d->title ?? '' }}" placeholder="Title">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="infos[{{ $i }}][text]" value="{{ $d->text ?? '' }}" placeholder="Text">
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                @else
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" name="infos[0][icon]" placeholder="Icon">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="infos[0][title]" placeholder="Title">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="infos[0][text]" placeholder="Text">
                                        </div>
                                    </div>
                                    <div id="infos-container"></div>
                                @endif 
                                <button type="button" class="btn btn-primary" id="add-info">Add Info</button>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tags</label>
                                @if(isset($data)) 
                                <div id="tags-container">
                                    @foreach(json_decode($data->tags) as $i=>$d)
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" name="tags[{{ $i }}][icon]" value="{{ $d->icon ?? '' }}" placeholder="Icon">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="tags[{{ $i }}][text]" value="{{ $d->text ?? '' }}" placeholder="Text">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" name="tags[0][icon]" placeholder="Icon">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="tags[0][text]" placeholder="Text">
                                        </div>
                                    </div>
                                    <div id="tags-container"></div>
                                @endif 
                                <button type="button" class="btn btn-primary" id="add-tag">Add Tag</button>
                            </div>

                            <div class="mb-3">

                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Included</label>
                                        @if(isset($data)) 
                                        <div id="included-container">
                                            @foreach(json_decode($data->included_excluded)->included as $i=>$d)
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <input type="text" class="form-control" name="included_excluded[included][{{ $i }}][text]" value="{{ $d->text ?? '' }}" placeholder="Text">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <input type="text" class="form-control" name="included_excluded[included][0][text]" placeholder="Text">
                                                </div>
                                            </div>
                                            <div id="included-container"></div>
                                        @endif 
                                        <button type="button" class="btn btn-primary" id="add-included">Add +</button>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Excluded</label>
                                        @if(isset($data)) 
                                        <div id="excluded-container">
                                            @foreach(json_decode($data->included_excluded)->excluded as $i=>$d)
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <input type="text" class="form-control" name="included_excluded[excluded][{{ $i }}][text]" value="{{ $d->text ?? '' }}" placeholder="Text">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <input type="text" class="form-control" name="included_excluded[excluded][0][text]" placeholder="Text">
                                                </div>
                                            </div>
                                            <div id="excluded-container"></div>
                                        @endif 
                                        <button type="button" class="btn btn-primary" id="add-excluded">Add +</button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tour Plan</label>
                                @if(isset($data)) 
                                    <div id="tour_plan-container">
                                        @foreach(json_decode($data->tour_plan) as $i=>$d)
                                        <div class="row mb-3">
                                            <div class="col">
                                                <input type="text" class="form-control" name="tour_plan[{{ $i }}][main_title]" value="{{ $d->main_title ?? '' }}" placeholder="Icon">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" name="tour_plan[{{ $i }}][sub_title]" value="{{ $d->sub_title ?? '' }}" placeholder="Text">
                                            </div>
                                            <div class="mt-2">
                                                <div class="quill-container" data-name="tour_plan[{{ $i }}][body]">
                                                    {!! $d->body !!}
                                                </div>
                                            </div>
                                            <div class="mb-4"></div>
                                            <div class="mb-4"></div>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" name="tour_plan[0][main_title]" placeholder="Title">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="tour_plan[0][sub_title]" placeholder="Subtitle">
                                        </div>
                                        <div class="mt-2">
                                            <div class="quill-container" data-name="tour_plan[0][body]"></div>
                                        </div>
                                        <div class="mb-4"></div>
                                        <div class="mb-4"></div>
                                    </div>
                                    <div id="tour_plan-container"></div>
                                @endif 
                                <button type="button" class="btn btn-primary" id="add-tour_plan">Add +</button>
                            </div>

                            <div class="mb-3">
                                <label for="map" class="form-label">Map Coordinates</label>
                                <input type="text" class="form-control" id="map" name="tour_map" value="{{ $data->tour_map ?? '' }}" required>
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
                                        <p><i>Package Images:</i></p>
                                        @foreach(json_decode($data->images) as $d)
                                            <div class="col-12 col-sm-3">
                                                <img src="{{ asset('storage/'. $d->url) }}" alt="{{ $d->caption }}" class="w-100">
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
                                <textarea type="text" class="form-control" id="meta_description" name="meta_description">{{ $data->meta_description ?? '' }}</textarea>
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
        // looks messy? Just know that it works!

        $(document).ready(function() {
            const packages_body_text_quill = new Quill('#packageBodyTextEditor', {
                theme: 'snow',
                placeholder: 'Compose...',
                modules: {
                    toolbar: true,
                }
            });

            const package_create_form = document.querySelector('#packageCreateForm');
            const package_body_text = document.querySelector('#packageBodyHiddenInput');
            package_create_form.addEventListener('submit', function() {
                package_body_text.value = packages_body_text_quill.root.innerHTML;
            });


            let infoCount = {{ isset($data) ? count(json_decode($data->infos)) : 1 }};
            $('#add-info').click(function() {
                $('#infos-container').append(`
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" name="infos[${infoCount}][icon]" placeholder="Icon">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="infos[${infoCount}][title]" placeholder="Title">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="infos[${infoCount}][text]" placeholder="Text">
                    </div>
                </div>
                `);
                infoCount++;
            });

            let tagCount = {{ isset($data) ? count(json_decode($data->tags)) : 1 }};
            $('#add-tag').click(function() {
                $('#tags-container').append(`
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" name="tags[${tagCount}][icon]" placeholder="Icon">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="tags[${tagCount}][text]" placeholder="Text">
                    </div>
                </div>
                `);
                tagCount++;
            });

            let includedCount = {{ isset($data) ? count(json_decode($data->included_excluded)->included) : 1 }};
            $('#add-included').click(function() {
                $('#included-container').append(`
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" name="included_excluded[included][${includedCount}][text]" placeholder="Text">
                    </div>
                </div>
                `);
                includedCount++;
            });

            let excludedCount = {{ isset($data) ? count(json_decode($data->included_excluded)->excluded) : 1 }};;
            $('#add-excluded').click(function() {
                $('#excluded-container').append(`
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" name="included_excluded[excluded][${excludedCount}][text]" placeholder="Text">
                    </div>
                </div>
                `);
                excludedCount++;
            });

            let tourPlanCount = {{ isset($data) ? count(json_decode($data->tour_plan)) : 1 }};
        
            initializeQuill('.quill-container');

            $('#add-tour_plan').click(function() {
                const newTourPlan = `
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" name="tour_plan[${tourPlanCount}][main_title]" placeholder="Title">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="tour_plan[${tourPlanCount}][sub_title]" placeholder="Subtitle">
                        </div>
                        <div class="mt-2">
                            <div class="quill-container" data-name="tour_plan[${tourPlanCount}][body]"></div>
                        </div>
                        <div class="mb-4"></div>
                        <div class="mb-4"></div>
                    </div>
                `;
                $('#tour_plan-container').append(newTourPlan);
                initializeQuill(`.quill-container[data-name="tour_plan[${tourPlanCount}][body]"]`);
                tourPlanCount++;
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

        function initializeQuill(selector) {
            $(selector).each(function() {
                const container = $(this).get(0);
                const quill = new Quill(container, {
                    theme: 'snow',
                    placeholder: 'Text',
                });

                const input = $('<input>').attr({
                    type: 'hidden',
                    name: $(this).data('name')
                }).appendTo($(this));

                quill.on('text-change', function() {
                    input.val(quill.root.innerHTML);
                });

                // Set initial value if available
                const initialValue = container.innerHTML.trim();
                if (initialValue !== '') {
                    quill.clipboard.dangerouslyPasteHTML(initialValue);
                }
            });
        }
    </script>
</x-admin-master-layout>