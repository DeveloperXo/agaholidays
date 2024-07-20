<x-admin-master-layout>
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <a href="{{ route('admin_package_queries.view_all') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Package Queries</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-envelope-open-heart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $data->package_queries_count ?? '' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card customers-card">
                            <a href="{{ route('admin_contact_queries.view_all') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Contact Queries</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-envelope-at"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $data->contact_queries_count ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card customers-card">
                            <a href="{{ route('admin_users.view_all') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Users</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $data->user_count ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <a href="{{ route('admin_blogs.view_all') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Blogs</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark-richtext"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $data->blogs_count ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <a href="{{ route('admin_packages.view_all') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Packages</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-image-alt"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $data->packages_count ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <a href="{{ route('admin_destinations.view_all') }}">
                                <div class="card-body">
                                    <h5 class="card-title">Destinations</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-signpost-split"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $data->destinations_count ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col col-12">
                        <div class="container-xl">
                            <div class="table-responsive mt-4 card">
                                <div class="table-wrapper">
                                    <div class="table-title bg-primary text-white px-3 py-2">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <h5 class="m-0">Recent <b>Package Queries</b></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>					
                                                    <th>Email</th>					
                                                    <th>Phone</th>
                                                    <th>Destination</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($data->package_queries) @foreach($data->package_queries as $d)
                                                    <tr>
                                                        <td>{{ $d->id }}</td>
                                                        <td>{{ $d->name }}</td>
                                                        <td>{{ $d->email }}</td>
                                                        <td>{{ $d->phone }}</td>           
                                                        <td>{{ $d->destination }}</td>
                                                        <td class="text-end"><a href="{{ route('admin_package_queries.update_view', $d->id) }}" class="btn btn-sm btn-primary">View</a></td>
                                                    </tr>
                                                @endforeach @endisset
                                            </tbody>
                                        </table>
                                        <a href="{{ route('admin_package_queries.view_all') }}" class="btn btn-sm btn-primary shadow float-end my-2">View All</a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive mt-5 card">
                                <div class="table-wrapper">
                                    <div class="table-title bg-primary text-white px-3 py-2">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <h5 class="m-0">Recent <b>Users</b></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>					
                                                    <th>Email</th>					
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($data->users) @foreach($data->users as $d)
                                                    <tr>
                                                        <td>{{ $d->id }}</td>
                                                        <td>{{ $d->name }}</td>
                                                        <td>{{ $d->email }}</td>
                                                        <td>{{ $d->role }}</td>           
                                                        <td class="text-end"><a href="{{ route('admin_users.update_view', $d->id) }}" class="btn btn-sm btn-primary">View</a></td>
                                                    </tr>
                                                @endforeach @endisset
                                            </tbody>
                                        </table>
                                        <a href="{{ route('admin_users.view_all') }}" class="btn btn-sm btn-primary shadow float-end my-2">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- right side columns -->
            <div class="col-lg-3">
                <h5>Space for Google Analytics</h5>
            </div>

        </div>
    </section>
</x-admin-master-layout>