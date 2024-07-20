<x-admin-master-layout>
    <div class="pagetitle">
        <h1>Manage Pages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_manage_pages') }}">Manage Pages</a></li>
                <li class="breadcrumb-item active">{{ isset($data) ? $data->page_title : 'New' }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($data) ? 'Manage '.$data->page_title.' Page' : 'Add new Page' }}</h5>

                        <form class="row g-3" method="POST" action="{{ isset($data) ? route('admin_manage_pages_single.update', $data->id) : route('admin_manage_pages_single.create.create') }}" enctype="multipart/form-data">
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
                                <label for="page_title" class="form-label">Page Title</label>
                                <input type="text" class="form-control" id="page_title" name="page_title" value="{{ $data->page_title ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label for="banner_title" class="form-label">Banner Title</label>
                                <input type="text" class="form-control" id="banner_title" name="banner_title" value="{{ $data->banner_title ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label for="banner_text" class="form-label">Banner Text</label>
                                <textarea type="text" class="form-control" id="banner_text" name="banner_text">{{ $data->banner_text ?? '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="banner_image" class="form-label">Banner Image</label>
                                <input type="file" class="form-control" id="banner_image" name="banner_image">
                                
                                @isset($data)
                                    <div class="banner-img mt-4" style="width: 100%; height: 250px;">
                                        <h6><i>Current banner image:</i></h6>
                                        <img src="{{ asset('storage/'.($data->banner_image)) }}" alt="Banner Image" class="w-100 h-100 rounded" style="object-fit:cover;">
                                    </div>
                                @endisset
                            </div>

                            @if(!isset($data))
                                <div class="col-12">
                                    <label for="page_url" class="form-label">Page Url</label>
                                    <input type="text" class="form-control" id="page_url" name="page_url" placeholder="eg: /destinations">
                                </div>
                                <div class="col-12">
                                    <label for="page_name" class="form-label">Page Name</label>
                                    <select name="page_name" id="page_name" class="form-select">
                                        <option value="home_page">home_page</option>
                                        <option value="destinations_page">destinations_page</option>
                                        <option value="packages_page">packages_page</option>
                                        <option value="blogs_page">blogs_page</option>
                                        <option value="about_page">about_page</option>
                                        <option value="contact_page">contact_page</option>
                                        <option value="privacy_policy_page">privacy_policy_page</option>
                                        <option value="terms_and_conditions_page">terms_and_conditions_page</option>
                                    </select>
                                </div>
                            @endif

                            <div class="col-12">
                                <h5 class="mt-5"><i>SEO :-</i></h5>
                                <label for="page_meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="page_meta_title" name="page_meta_title" value="{{ $data->page_meta_title ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label for="page_meta_description" class="form-label">Meta Description</label>
                                <textarea type="text" class="form-control" id="page_meta_description" name="page_meta_description">{{ $data->page_meta_description ?? '' }}</textarea>
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