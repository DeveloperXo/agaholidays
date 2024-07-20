@php use Carbon\Carbon; @endphp
<x-admin-master-layout>
    <div class="pagetitle">
        <h1>All Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">All Users</h5>
                        </div>

                        <div class="error-msgs">
                            @foreach ($errors->all() as $error)
                                <ul>
                                    <li class="text-danger">{{ $error }}</li>
                                </ul>
                            @endforeach
                        </div>
            
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Email Verified At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                                @if (isset($data)) @foreach($data as $d)
                                <tr>
                                    <th scope="row">{{ $d->id }}</th>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->role }}</td>
                                    <td>{{ isset($d->email_verified_at) ? Carbon::parse($d->email_verified_at)->format('d-m-Y') : 'Not verified' }}</td>
                                    <td>
                                        <a href="{{ route('admin_users.update_view', $d->id) }}" class="btn btn-primary btn-sm">View</a>
                                        <x-bs-modal
                                            modal_id="deleteUserModal{{ $d->id }}"
                                            modal_title="Delete User"
                                            modal_body="Are you sure you want to delete this user: <br/> <b><i>Name - {{ $d->name }}</i></b>"
                                            form_id="deleteUserForm{{ $d->id }}"
                                            modal_btn="Delete"
                                        >
                                            <form id="deleteUserForm{{ $d->id }}" action="{{ route('admin_users.delete', $d->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </x-bs-modal>

                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $d->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                @endforeach @endif
                            </tbody>
                        </table>
            
                    </div>
                    <div class="card-footer">
                        <div class="pagination-menu d-flex justify-content-end">
                            {{ $data->links('components.pagination') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
</x-admin-master-layout>