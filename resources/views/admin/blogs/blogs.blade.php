<x-admin-master-layout>
    <div class="pagetitle">
        <h1>Manage Blogs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Blogs</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">All Blogs</h5>
                            <a class="btn btn-primary" href="{{ route('admin_blogs.view_create') }}">Add New</a>
                        </div>
            
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Blog title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Featured image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
            
                                @if (isset($data)) @foreach($data as $d)
                                <tr>
                                    <th scope="row">{{ $d->id }}</th>
                                    <td>{{ $d->blog_title }}</td>
                                    <td>{{ $d->category->category_name }}</td>
                                    <td><img src="{{ asset('storage/'.$d->featured_image) }}" alt="Blog image" style="width: 40px; height: 40px;"></td>
                                    <td>
                                        <form action="{{ route('admin_blogs.update_update', $d->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <select name="status" id="statusSelect" class="form-select" onchange="this.parentElement.submit()">
                                                <option value="draft"  {{ $d->status === 'draft' ? 'selected=selected' : '' }}>Draft</option>
                                                <option value="published" {{ $d->status === 'published' ? 'selected=selected' : '' }}>Published</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin_blogs.update_view', $d->id) }}" class="btn btn-primary btn-sm">Manage</a>
                                        <x-bs-modal
                                            modal_id="deleteBlogModal"
                                            modal_title="Delete Blog"
                                            modal_body="Are you sure you want to delete this blog?"
                                            form_id="deleteBlogForm{{ $d->id }}"
                                            modal_btn="Delete"
                                        >
                                            <form id="deleteBlogForm{{ $d->id }}" action="{{ route('admin_blogs.delete', $d->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </x-bs-modal>

                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteBlogModal">
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