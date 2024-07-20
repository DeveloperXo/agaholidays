<x-admin-master-layout>
    <div class="pagetitle">
        <h1>View Query</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_package_queries.view_all') }}">All Queries</a></li>
                <li class="breadcrumb-item active">{{ isset($data) ? $data->name : 'New' }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($data) ? $data->name : 'New' }}</h5>

                        <form class="row g-3" method="POST" action="{{-- isset($data) ? route('admin_users.update_update', $data->id) : route('admin_users.create_create') --}}" enctype="multipart/form-data">
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
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name ?? '' }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $data->email ?? '' }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone ?? '' }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="destination" class="form-label">Destination</label>
                                        <input type="text" class="form-control" id="destination" name="destination" value="{{ $data->destination }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="departure_date" class="form-label">Departure Date</label>
                                        <input type="text" class="form-control" id="departure_date" name="departure_date" value="{{ $data->departure_date }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="departure_city" class="form-label">Departure City</label>
                                        <input type="text" class="form-control" id="departure_city" name="departure_city" value="{{ $data->departure_city }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="adult" class="form-label">Adult</label>
                                        <input type="text" class="form-control" id="adult" name="adult" value="{{ $data->adult }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="child" class="form-label">Child</label>
                                        <input type="text" class="form-control" id="child" name="child" value="{{ $data->child }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="infant" class="form-label">Infant</label>
                                        <input type="text" class="form-control" id="infant" name="infant" value="{{ $data->infant }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="package_id" class="form-label">Package</label>
                                        <input type="text" class="form-control" id="package_id" name="package_id" value="{{ isset($data->package) ? $data->package->package_name : '-' }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="user_id" class="form-label">User</label>
                                        <input type="text" class="form-control" id="user_id" name="user_id" value="{{ isset($data->user) ? $data->user->name : 'Unauthenticated User' }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col">
                                        <label for="created_at" class="form-label">Created At</label>
                                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $data->created_at }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="updated_at" class="form-label">Updated At</label>
                                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $data->updated_at }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="col">
                                    <button type="button" class="btn btn-primary" {{ !isset($data->package) ? 'disabled' : '' }}><a href="{{ isset($data->package) ? route('user_packages_single', $data->package->id) : '#' }}" class="text-white" >View Package</a></button>
                                    <button type="button" class="btn btn-primary" {{ !isset($data->user) ? 'disabled' : '' }}><a href="{{ isset($data->user) ? route('admin_users.update_view', $data->user->id) : '#' }}" class="text-white" >View User</a></button>
                                </div>
                            </div>

                            <div class="mt-4">
                                {{--<button type="submit" class="btn btn-primary">{{ isset($data) ? 'Save' : 'Create' }}</button>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-master-layout>