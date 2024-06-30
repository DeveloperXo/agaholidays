<x-admin-master-layout>
    <div class="pagetitle">
        <h1>Manage Pages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Manage Pages</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">All Pages</h5>
                            <a class="btn btn-primary" href="{{ route('admin_manage_pages_single.create.view') }}">Add New</a>
                        </div>
            
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Page title</th>
                                    <th scope="col">Page url</th>
                                    <th scope="col">Banner title</th>
                                    <th scope="col">Banner image</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
            
                                @if (isset($data)) @foreach($data as $d)
                                <tr>
                                    <th scope="row">{{ $d->id }}</th>
                                    <td>{{ $d->page_title }}</td>
                                    <td><a href="{{ $d->page_url }}">{{ $d->page_url }}</a></td>
                                    <td>{{ $d->banner_title }}</td>
                                    <td><img src="{{ asset('storage/'.$d->banner_image) }}" alt="Banner image" style="width: 40px; height: 40px;"></td>
                                    <td>
                                        <form action="{{ route('admin_manage_pages_single.update', $d->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <select name="status" id="statusSelect" class="form-select" onchange="console.log(this.parentElement.submit())">
                                                <option value="draft"  {{ $d->status === 'draft' ? 'selected=selected' : '' }}>Draft</option>
                                                <option value="published" {{ $d->status === 'published' ? 'selected=selected' : '' }}>Published</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin_manage_pages_single.view', $d->id) }}" class="btn btn-primary btn-sm">Manage</a>
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