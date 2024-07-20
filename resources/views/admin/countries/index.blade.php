<x-admin-master-layout>
    <div class="pagetitle">
        <h1>Manage Countries</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Countries</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">All Countries</h5>
                            <a class="btn btn-primary" href="{{ route('admin_countries.view_create') }}">Add New</a>
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
                                    <th scope="col">Country Name</th>
                                    <th scope="col">Country Code</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                                @if (isset($data)) @foreach($data as $d)
                                <tr>
                                    <th scope="row">{{ $d->id }}</th>
                                    <td>{{ $d->country_name }}</td>
                                    <td>{{ $d->country_code }}</td>
                                    <td>{{ $d->description }}</td>
                                    <td>
                                        <a href="{{ route('admin_countries.update_view', $d->id) }}" class="btn btn-primary btn-sm">Manage</a>
                                        <x-bs-modal
                                            modal_id="deleteCountryModal{{ $d->id }}"
                                            modal_title="Delete Country"
                                            modal_body="Are you sure you want to delete this country? <br/> <b><i>Title - {{ $d->country_name }}</i></b> <br/> <span class='text-danger'>All other related posts associated with this country will also be deleted permanently !</span>"
                                            form_id="deleteCountryForm{{ $d->id }}"
                                            modal_btn="Delete"
                                        >
                                            <form id="deleteCountryForm{{ $d->id }}" action="{{ route('admin_countries.delete', $d->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </x-bs-modal>

                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCountryModal{{ $d->id }}">
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