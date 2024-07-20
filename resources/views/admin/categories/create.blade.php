<x-admin-master-layout>
    <div class="pagetitle">
        <h1>Manage Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_categories.view_all') }}">Manage Categories</a></li>
                <li class="breadcrumb-item active">{{ isset($data) ? $data->category_name : 'New' }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($data) ? 'Manage '.$data->category_name.' Category' : 'Create new Category' }}</h5>

                        <form class="row g-3" method="POST" action="{{ isset($data) ? route('admin_categories.update_update', $data->id) : route('admin_categories.create_create') }}" enctype="multipart/form-data">
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
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $data->category_name ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label for="intro_text" class="form-label">Intro Text</label>
                                <input type="text" class="form-control" id="intro_text" name="intro_text" value="{{ $data->intro_text ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label for="category_type" class="form-label">Category Type</label>
                                <select class="form-select" id="category_type" name="category_type">
                                    <option value="blogs" {{ isset($data) && $data->category_type === 'blogs' ? 'selected=selected' : '' }}>Blogs</option>
                                    <option value="packages" {{ isset($data) && $data->category_type === 'packages' ? 'selected=selected' : '' }}>Packages</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                
                                @isset($data)
                                    <div class="banner-img mt-4" style="width: 100%; height: 250px;">
                                        <h6><i>Current image:</i></h6>
                                        <img src="{{ asset('storage/'.($data->image)) }}" alt="{{ $data->category_name }}" class="w-100 h-100 rounded" style="object-fit:cover;">
                                    </div>
                                @endisset
                            </div>

                            <div class="col-12">
                                <h5 class="mt-5"><i>SEO :-</i></h5>
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $data->meta_title ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea type="text" class="form-control" id="meta_description" name="meta_description">{{ $data->meta_description ?? '' }}</textarea>
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