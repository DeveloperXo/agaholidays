@php use Carbon\Carbon; @endphp
<x-admin-master-layout>
    <div class="pagetitle">
        <h1>View User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_users.view_all') }}">All Users</a></li>
                <li class="breadcrumb-item active">{{ isset($data) ? $data->name : 'New' }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($data) ? $data->name : 'User' }}</h5>

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
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name ?? '' }}" readonly>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $data->email ?? '' }}" readonly>
                            </div>
                            <div class="col-12">
                                <label for="role" class="form-label">Role</label>
                                <input type="text" class="form-control" id="role" name="role" value="{{ $data->role ?? '' }}" readonly>
                            </div>

                            @isset($data)
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col">
                                            <label for="email_verified_at" class="form-label">Email Verified At</label>
                                            <input type="text" class="form-control" id="email_verified_at" name="email_verified_at" value="{{ $data->email_verified_at }}" readonly>
                                        </div>
        
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
                            @endisset

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