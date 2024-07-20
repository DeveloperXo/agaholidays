<div class="package-single-sidebar card">
    <div class="card-body">
        <div class="card-header-z mb-4">
            <h4 class="price-from m-0">
                <span class="text"><i class="bi bi-tags"></i> &nbsp;Starting from</span>
                <div class="mb-2"></div>
                <span class="price"><i class="bi bi-currency-rupee"></i></i><span class="format-price" data-value="{{ $package->starting_price }}">{{ $package->starting_price }}</span></span>
            </h4>
        </div>

        <hr style="color: #0a0a0a40;" />

        <div class="enquiry-form">
            <form action="{{ route('user_submit_package_query') }}" method="POST">
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <div class="spacing">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="{{ old('name') }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="spacing">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your email" value="{{ old('email') }}" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="spacing">
                    <label for="mobileNumber" class="form-label">Mobile number</label>
                    <input type="phone" class="form-control" id="mobileNumber" name="phone" placeholder="Your mobile number" value="{{ old('phone') }}" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="spacing">
                    <label for="destination" class="form-label">Where do you want to go?</label>
                    <select class="selectpicker form-control" id="destination" name="destination">
                        <option value="">Select your destination</option>
                        @isset($destination_places) @foreach($destination_places as $d)
                            <option value="{{ $d->place_name }}">{{ $d->place_name }}</option>
                        @endforeach @endisset
                    </select>
                    <x-input-error :messages="$errors->get('destination')" class="mt-2" />
                </div>

                <div class="spacing">
                    <label for="departure_date" class="form-label">Departure date</label>
                    <input type="date" class="form-control" id="departure_date" name="departure_date" value="{{ old('departure_date') }}" />
                    <x-input-error :messages="$errors->get('departure_date')" class="mt-2" />
                </div>

                <div class="spacing">
                    <label for="departureCity" class="form-label">Departure city</label>
                    <select class="selectpicker form-control" id="departureCity" name="departure_city">
                        <option value="">Select your departure city</option>
                        @isset($destination_places) @foreach($departure_cities as $d)
                            <option value="{{ $d->place_name }}">{{ $d->place_name }}</option>
                        @endforeach @endisset
                    </select>
                    <x-input-error :messages="$errors->get('departure_city')" class="mt-2" />
                </div>

                <div class="spacing">
                    <div class="input-group column-gap-3">
                        <div class="w-25">
                            <label for="adult" class="form-label">Adult</label>
                            <select id="adult" name="adult" class="form-control">
                                <option value="1">1</option>
                                <option value="2" selected="selected">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="w-25">
                            <label for="child" class="form-label">Child</label>
                            <select id="child" name="child" class="form-control">
                                <option value="0" selected="selected">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="w-25">
                            <label for="infant" class="form-label">Infant</label>
                            <select id="infant" name="infant" class="form-control">
                                <option value="0" selected="selected">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('adult')" class="mt-2" />
                        <x-input-error :messages="$errors->get('child')" class="mt-2" />
                        <x-input-error :messages="$errors->get('infant')" class="mt-2" />
                    </div>
                </div>

                <div class="submit-btn mt-5">
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>