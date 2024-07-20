<x-admin-master-layout>
    <div class="pagetitle">
        <h1>View Query</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_contact_queries.view_all') }}">All Queries</a></li>
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
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" value="{{ $data->subject }}" readonly>
                            </div>
                            
                            <div class="col-12 mt-4">
                                <label for="message" class="form-label">Message</label>
                                <textarea type="text" class="form-control" id="message" name="message" readonly>{{ $data->message }}</textarea>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="row">
                                 <div class="col">
                                        <label for="user_id" class="form-label">User</label>
                                        <input type="text" class="form-control" id="user_id" name="user_id" value="{{ isset($data->user) ? $data->user->name : 'Unauthenticated User' }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="ip_address" class="form-label">Ip Address</label>
                                        <input type="text" class="form-control" id="ip_address" name="ip_address" value="{{ $data->ip_address }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="user_agent" class="form-label">User Agent</label>
                                        <input type="text" class="form-control" id="user_agent" name="user_agent" value="{{ $data->user_agent }}" readonly>
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