<div class="accordion" id="packageSidebar_1">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button packages_accordion_btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Search
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show packages_accordion_collapse" >
            <div class="accordion-body">
                <div class="search-form-wrap">
                    <form class="search-form" method="GET" action="{{ route('user_filter_packages') }}">
                        <input class="form-control" type="text" placeholder="Type here" name="package_name" value="{{ request()->package_name }}"/>
                        <input class="btn btn-primary mt-3 w-100 " type="submit" value="Search" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button packages_accordion_btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                Filters
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse show packages_accordion_collapse" >
            <form class="price-filter-form" method="GET" action="{{ route('user_filter_packages') }}">
                <div class="accordion-body">
                    <h5 class="filter-title">Filter Price</h5>
                    <div class="price-filter-form-wrap">
                        <div class="range_container">
                            <div class="sliders_control">
                                <input id="fromSlider" type="range" value="{{ request()->min_price ?? 5000 }}" min="5000" max="100000" />
                                <input id="toSlider" type="range" value="{{ request()->max_price ?? 200000 }}" min="5000" max="200000" />
                            </div>
                            <div class="form_control">
                                <div class="form_control_container d-flex align-items-center gap-2">
                                    <div class="form_control_container__time">Min</div>
                                    <input class="form_control_container__time__input" type="number" id="fromInput" value="{{ request()->min_price ?? 5000 }}" min="5000" max="100000" name="min_price" readonly />
                                </div>
                                <div class="form_control_container d-flex align-items-center gap-2">
                                    <div class="form_control_container__time">Max</div>
                                    <input class="form_control_container__time__input" type="number" id="toInput" value="{{ request()->max_price ?? 200000 }}" min="100000" max="200000" name="max_price" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr />
                    
                    <h5 class="filter-title mb-3">Category</h5>
                    
                    <div class="check-filter">
                        <ul class="check-ul">
                            @isset($categories) @foreach($categories as $d)
                                <li><input class="filter-checkbox" name="category_id[]" type="checkbox" id="cat-{{ $d->id }}" value="{{ $d->id }}" {{ in_array($d->id, request()->category_id ?? []) ? 'checked' : '' }} /><label for="cat-{{ $d->id }}">{{ $d->category_name }}</label></li>
                            @endforeach @endif
                        </ul>
                    </div>
                    
                    <hr />
                    
                    <h5 class="filter-title mb-3">Duration</h5>
                    
                    <div class="check-filter">
                        <ul class="check-ul">
                            <li><input class="filter-checkbox" type="checkbox" name="duration[]" id="0-3h" value="0-3h" {{ in_array('0-3h', request()->duration ?? []) ? 'checked' : '' }} />
                                <label for="0-3h">0 - 3 hours</label>
                            </li>
                            <li><input class="filter-checkbox" type="checkbox" name="duration[]" id="3-5h" value="3-5h" {{ in_array('3-5h', request()->duration ?? []) ? 'checked' : '' }} />
                                <label for="3-5h">3 - 5 hours</label>
                            </li>
                            <li><input class="filter-checkbox" type="checkbox" name="duration[]" id="5-7h" value="5-7h" {{ in_array('5-7h', request()->duration ?? []) ? 'checked' : '' }} />
                                <label for="5-7h">5 - 7 hours</label>
                            </li>
                            <li><input class="filter-checkbox" type="checkbox" name="duration[]" id="plus7h" value="plus7h" {{ in_array('plus7h', request()->duration ?? []) ? 'checked' : '' }} />
                                <label for="plus7h">+7 hours</label>
                            </li>
                            <li><input class="filter-checkbox" type="checkbox" name="duration[]" id="1-3d" value="1-3d" {{ in_array('1-3d', request()->duration ?? []) ? 'checked' : '' }} />
                                <label for="1-3d">1 - 3 days</label>
                            </li>
                            <li><input class="filter-checkbox" type="checkbox" name="duration[]" id="plus3d" value="plus3d" {{ in_array('plus3d', request()->duration ?? []) ? 'checked' : '' }} />
                                <label for="plus3d">+3 days</label>
                            </li>
                        </ul>
                    </div>
                    
                    <input class="btn btn-primary mt-3 w-100 " type="submit" value="Apply" />
                    
                </div>
            </form>
        </div>
    </div>
</div>