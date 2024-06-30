<x-admin-master-layout>
    <div class="pagetitle">
        <h1>{{ isset($data) ? $data->blog_title : 'New Blog' }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_blogs.view_all') }}">Blogs</a></li>
                <li class="breadcrumb-item active">{{ isset($data) ? $data->blog_title : 'New' }}</li>
            </ol>
        </nav>
    </div>

    <style>
        .tag {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 0.5em;
            margin: 0.2em;
            border-radius: 0.2em;
        }
        .tag .remove-tag {
            margin-left: 0.5em;
            cursor: pointer;
            font-weight: bold;
        }
        .tag-input-container {
            display: flex;
            flex-wrap: wrap;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.5em;
        }
        .tag-input-container input {
            border: none;
            flex: 1;
            min-width: 100px;
            outline: none;
        }
    </style>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($data) ? 'Edit '.$data->blog_title : 'Create new Blog' }}</h5>

                        <form id="blogForm" class="row g-3" method="POST" action="{{ isset($data) ? route('admin_blogs.update_update', $data->id) : route('admin_blogs.create_create') }}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($data))
                                @method('PUT')
                            @else 
                                @method('POST')
                            @endif

                            <div class="error-msgs">
                                @foreach ($errors->all() as $error)
                                    <ul>
                                        <li class="text-danger">{{ $error }}</li>
                                    </ul>
                                @endforeach
                            </div>
                            
                            <div class="col-12">
                                <label for="blog_title" class="form-label">Blog Title</label>
                                <input type="text" class="form-control" id="blog_title" name="blog_title" value="{{ $data->blog_title ?? '' }}">
                            </div>

                            <div class="col-12">
                                <label for="blog_category" class="form-label">Category</label>
                                <select name="category_id" id="blog_category" class="form-select" required>
                                    <option value="">Select Category</option>
                                    @isset($categories) @foreach($categories as $d)
                                        <option value="{{ $d->id }}" {{ isset($data) && $data->category_id === $d->id ? 'selected=selected' : '' }}>{{ $d->category_name }}</option>
                                    @endforeach @endisset
                                </select>
                            </div>


                            <div class="col-12">
                                <label for="intro_text" class="form-label">Intro Text</label>
                                <input type="text" class="form-control" id="intro_text" name="intro_text" value="{{ $data->intro_text ?? '' }}">
                            </div>


                            <!-- Quill Editor Default -->
                            <div class="col-12 mb-5">
                                <p class="mb-2">Blog Content</p>

                                <div id="toolbar-container">
                                    <span class="ql-formats">
                                        <select class="ql-font"></select>
                                        <select class="ql-size"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-strike"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <select class="ql-color"></select>
                                        <select class="ql-background"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-script" value="sub"></button>
                                        <button class="ql-script" value="super"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-header" value="1"></button>
                                        <button class="ql-header" value="2"></button>
                                        <button class="ql-blockquote"></button>
                                        <button class="ql-code-block"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                        <button class="ql-indent" value="-1"></button>
                                        <button class="ql-indent" value="+1"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-direction" value="rtl"></button>
                                        <select class="ql-align"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-link"></button>
                                        <button class="ql-image"></button>
                                        <button class="ql-video"></button>
                                        <button class="ql-formula"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-clean"></button>
                                    </span>
                                </div>
                                <div id="blogContentEditor">
                                   {!! $data->blog_content ?? '' !!}
                                </div>
                            </div>
                            <!-- End Quill Editor Default -->

                            <input type="hidden" name="blog_content" id="hidden-blog-content">


                            <div class="col-12 mt-5">
                                <label for="tags" class="form-label">Tags:</label>
                                <div class="tag-input-container" id="tag-input-container">
                                    <input type="text" id="tag-input" placeholder="Enter a tag">
                                </div>

                                <input type="hidden" name="tags" id="tags-json">
                            </div>
                            <div class="col-12">
                                <label for="featured_image" class="form-label">Featured Image</label>
                                <input type="file" class="form-control" id="featured_image" name="featured_image" value="{{ $data->banner_title ?? '' }}">
                                
                                @isset($data)
                                    <div class="row">
                                        <div class="banner-img mt-4 col-12 col-sm-4" style="height: 220px;">
                                            <h6><i>Current featured image:</i></h6>
                                            <img src="{{ asset('storage/'.($data->featured_image)) }}" alt="Banner Image" class="w-100 h-100 rounded" style="object-fit:cover;">
                                        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quill = new Quill('#blogContentEditor', {
                theme: 'snow',
                placeholder: 'Compose...',
                modules: {
                    toolbar: '#toolbar-container',
                }
            });

            const form = document.querySelector('#blogForm');
            const blogContentInput = document.querySelector('#hidden-blog-content');
            form.addEventListener('submit', function(e) {
                blogContentInput.value = quill.root.innerHTML;
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            const tagInput = document.getElementById('tag-input');
            const tagInputContainer = document.getElementById('tag-input-container');
            const form = document.querySelector('#blogForm');
            const tagsJsonInput = document.getElementById('tags-json');
            let tags = [];

            function updateTagsJson() {
                tagsJsonInput.value = JSON.stringify(tags);
            }

            function createTagElement(tag) {
                const span = document.createElement('span');
                span.className = 'tag';
                span.innerText = tag;

                const removeBtn = document.createElement('span');
                removeBtn.className = 'remove-tag';
                removeBtn.innerText = 'x';
                removeBtn.onclick = function() {
                    tags = tags.filter(t => t !== tag);
                    tagInputContainer.removeChild(span);
                    updateTagsJson();
                };

                span.appendChild(removeBtn);
                return span;
            }

            tagInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const tag = tagInput.value.trim();
                    if (tag && !tags.includes(tag)) {
                        tags.push(tag);
                        const tagElement = createTagElement(tag);
                        tagInputContainer.insertBefore(tagElement, tagInput);
                        tagInput.value = '';
                        updateTagsJson();
                    }
                }
            });

            form.addEventListener('submit', function(e) {
                updateTagsJson();
            });
        });
    </script>
</x-admin-master-layout>