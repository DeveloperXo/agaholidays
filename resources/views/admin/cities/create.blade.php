<x-admin-master-layout>
    <div class="pagetitle">
        <h1>Manage Cities</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_cities.view_all') }}">Manage Cities</a></li>
                <li class="breadcrumb-item active">{{ isset($data) ? $data->city_name : 'New' }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($data) ? 'Edit '.$data->city_name : 'Create new City' }}</h5>

                        <form class="row g-3" method="POST" action="{{ isset($data) ? route('admin_cities.update_update', $data->id) : route('admin_cities.create_create') }}">
                            @csrf
                            @if(isset($data))
                                @method('PUT')
                            @endif

                            <div class="error-msgs">
                                @foreach ($errors->all() as $error)
                                    <ul>
                                        <li class="text-danger">{{ $error }}</li>
                                    </ul>
                                @endforeach
                            </div>
                            
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <label for="city_name" class="form-label">City Name</label>
                                        <input type="text" class="form-control" id="city_name" name="city_name" value="{{ $data->city_name ?? '' }}">
                                    </div>
                                    <div class="col">
                                        <label for="country_id" class="form-label">Country</label>
                                        <select name="country_id" id="country_id" class="form-select">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $d)
                                                <option value="{{ $d->id }}" {{ isset($data) && $d->id === $data->country_id ? 'selected=selected' : '' }}>{{ $d->country_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="city_code" class="form-label">City Code (Optional)</label>
                                        <input type="text" class="form-control" id="city_code" name="city_code" value="{{ $data->city_code ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Description (Optional)</label>
                                <textarea type="text" class="form-control" id="description" name="description">{{ $data->description ?? '' }}</textarea>
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
</x-admin-master-layout>