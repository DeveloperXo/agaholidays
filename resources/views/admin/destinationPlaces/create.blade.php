<x-admin-master-layout>
    <div class="pagetitle">
        <h1>Manage Destination Places</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_destination_places.view_all') }}">Manage Destination Places</a></li>
                <li class="breadcrumb-item active">{{ isset($data) ? $data->place_name : 'New' }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($data) ? 'Edit '.$data->place_name : 'Create new Place' }}</h5>

                        <form class="row g-3" method="POST" action="{{ isset($data) ? route('admin_destination_places.update_update', $data->id) : route('admin_destination_places.create_create') }}">
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
                                <label for="place_name" class="form-label">Place Name</label>
                                <input type="text" class="form-control" id="place_name" name="place_name" value="{{ $data->place_name ?? '' }}">
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