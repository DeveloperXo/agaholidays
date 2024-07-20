<x-admin-master-layout>
    <div class="pagetitle">
        <h1>Manage Packages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Packages</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">All Packages</h5>
                            <a class="btn btn-primary" href="{{ route('admin_packages.view_create') }}">Add New</a>
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
                                    <th scope="col">Title</th>
                                    <th scope="col">Starting Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                                @if (isset($data)) @foreach($data as $d)
                                <tr>
                                    <th scope="row">{{ $d->id }}</th>
                                    <td>{{ $d->package_name }}</td>
                                    <td><i class="bi bi-currency-rupee"></i>{{ $d->starting_price }}</td>
                                    <td><img src="{{ asset('storage/'. (json_decode($d->images)[0]->url ?? '')) }}" alt="{{ json_decode($d->images)[0]->caption ?? '' }}" style="width: 40px; height: 40px;"></td>
                                    <td>
                                        <form action="{{ route('admin_packages.update_status', $d->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <select name="status" id="statusSelect" class="form-select" onchange="this.parentElement.submit()">
                                                <option value="draft"  {{ $d->status === 'draft' ? 'selected=selected' : '' }}>Draft</option>
                                                <option value="published" {{ $d->status === 'published' ? 'selected=selected' : '' }}>Published</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin_packages.update_view', $d->id) }}" class="btn btn-primary btn-sm">Manage</a>
                                        <x-bs-modal
                                            modal_id="deletePackageModal{{ $d->id }}"
                                            modal_title="Delete Package"
                                            modal_body="Are you sure you want to delete this package: <br/> <b><i>Title - {{ $d->package_name }}</i></b>"
                                            form_id="deletePackageForm{{ $d->id }}"
                                            modal_btn="Delete"
                                        >
                                            <form id="deletePackageForm{{ $d->id }}" action="{{ route('admin_packages.delete', $d->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </x-bs-modal>

                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePackageModal{{ $d->id }}">
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