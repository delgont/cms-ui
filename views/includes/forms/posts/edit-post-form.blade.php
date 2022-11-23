<form action="{{ route('delgont.posts.update', ['id' => $post->id]) }}" class="row" id="editPostForm" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- post title, name and content -->
    <div class="col-lg-6 order-2">
        <div class="card mb-1 p-0 alert alert-light">
            <div class="card-body py-2 row text-capitalize">
                <div class="col-lg-1">
                    @include('delgont::includes.dropdowns.choose-post-parent-dropdown', ['currentPostParent' => ($post->parent) ? $post->parent->post_title : 'Choose Parent Post Or Page'])
                </div>
                <div class="col-lg-3">
                    <small class="text-primary font-weight-bold">Post Parent</small>
                    <h6 class="mb-0 small text-primary" id="postParentHolder" data-toggle="tooltip" title="{{ ($post->parent) ? $post->parent->post_title : 'Choose Parent' }}">{{ ($post->parent) ? str_limit($post->parent->post_title, 9) : 'Choose Parent' }}</h6>
                </div>
                <div class="col-lg-1">
                    @includeIf('delgont::includes.dropdowns.choose-post-template-dropdown', ['currentPostTemplate' => ($post->template) ? $post->template->name : 'Choose'])
                </div>
                <div class="col-lg-3">
                    <small class="text-primary font-weight-bold">Post Template</small>
                    <h6 class="mb-0 small text-primary">{{ ($post->template) ? $post->template->name : '' }}</h6>
                </div>
                <div class="col-lg-1">
                    @includeIf('delgont::includes.dropdowns.choose-menu-dropdown', ['currentMenu' => ($post->menu) ? $post->menu->name : 'Choose Menu'])
                </div>
                <div class="col-lg-3">
                    <small class="text-primary font-weight-bold">Menu</small>
                    <h6 class="mb-0 small text-primary" id="menuNameHolder">{{ ($post->menu) ? $post->menu->name : '' }}</h6>
                </div>
                <input type="hidden" name="template_id" value="{{ old('template_id') ?? $post->template_id }}" id="templateIdInput" />
                <input type="hidden" name="parent_id" value="{{ old('parent_id') ?? $post->parent_id }}" id="parentIdInput" />
                <input type="hidden" name="menu_id" value="{{ old('menu_id') ?? $post->menu_id }}" id="menuIdInput" />
            </div>
        </div>
        <div class="card shadow-sm mb-2 p-0 alert alert-light">
            <div class="card-body">
                <label for="title">Post Title</label>
                <textarea name="post_title" id="title" cols="10" rows="1" class="form-control" placeholder="Post Title">{{ (old('post_title') != null) ? old('post_title') : $post->post_title  }}</textarea>
                <small class="text-danger post-title-error">{{ $errors->first('post_title') }}</small>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <textarea name="post_content" id="editor" class="form-control custom-scrollbar" cols="30" rows="10" >
                    {{ (old('post_content') != null) ? old('post_content') : $post->post_content  }}
                </textarea>
            </div>
        </div>
    </div>

    <div class="col-lg-3 order-1">
        <div class="card mb-3 p-0 alert alert-light">
            <div class="card-body">

                <!-- Post Type -->
                <label for="postType" class="text-dark font-weight-bold">Post Type</label>
                @if ($count = count($posttypes))
                    <input type="text" name="post_type" list="postTypeList" value="{{ ($post->posttype) ? $post->posttype->name : '' }}" class="form-control mb-1" />
                    <datalist id="postTypeList">
                        @foreach ($posttypes as $posttype)
                            <option value="{{ $posttype->name }}">
                        @endforeach
                    </datalist>
                @else
                <input type="text" name="post_type" class="form-control">
                @endif

                <small class="text-danger">{{ $errors->first('post_type_id') }}</small>

                <!-- Post Extract Text -->
                <label for="extractText" class="text-dark font-weight-bold">Post Extract Text | Description</label>
                <textarea name="extract_text" id="extractText" cols="30" rows="3" class="mt-2 form-control custom-scrollbar" placeholder="Post Extract Text">{{ (old('extract_text') != null) ? old('extract_text') : $post->extract_text  }}</textarea>
                <small class="text-danger post-extract-error">{{ $errors->first('extract_text') }}</small>
                <small>
                    Extract Text are optional hand-crafted summaries of your news content that can be used in your website
                </small>

                <br />
                <label for="slug" class="text-dark font-weight-bold">Url Slug</label>
                <input type="text" value="{{ old('slug') ?? $post->slug }}" name="slug" class="form-control" data-toggle="tooltip" title="Post Slug" />
                <small class="text-danger">{{ $errors->first('slug') }}</small>
                <small class="text-primary">{{ ($post->slug) ? url($post->slug) : '' }}</small>

            </div>
        </div>

        <!-- Post Category -->
        <div class="card p-0 alert alert-light">
            <div class="card-body">
                <h6 class="mb-2 text-capitalize text-dark font-weight-bold border-bottom border-light pb-2">Categorize your post</h6>
                @if (count($categories))
                    @foreach ($categories as $category)
                        <div class="form-check {{ ($category->parent_id) ? 'ml-3' : '' }}">
                            <label class="form-check-label text-primary font-weight-bold">
                                @if (count($post->categories))
                                    @php
                                        $post_categories_ids = [];
                                    @endphp
                                    @foreach ($post->categories as $post_categories)
                                    @php
                                        array_push($post_categories_ids, $post_categories->id)
                                    @endphp 
                                    @endforeach
                                    <input type="checkbox" class="form-check-input" name="category[]" id="{{ 'category'.$category->id }}" value="{{ $category->id }}" {{ (in_array($category->id, $post_categories_ids)) ? 'checked' : ''}}>
                                    {{ $category->name }}
                                @else
                                <input type="checkbox" class="form-check-input" name="category[]" id="{{ 'category'.$category->id }}" value="{{ $category->id }}">
                                {{ $category->name }}
                                @endif
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        
    </div>

    

    <div class="col-lg-3 order-3">

        <!--Post Post types-->
        <div class="card mb-2 alert alert-primary p-1">
            <div class="card-body py-2">
                @if (count($posttypes) > 0)
                <small>Choose the type of posts to show as listing on this Post | Page</small>
                <div class="dropdown">
                    <a id="my-dropdown" class="dropdown-toggle btn btn-sm btn-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span style="font-size: 14px;" class="text-capitalize" data-toggle="tooltip" title="Select Post Type">
                            {{ ($post->postsOfType) ? $post->postsOfType->postType->name.' Posts'  : 'Choose Post Type' }}
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-list shadow-lg animated--grow-in p-0 scrollable custom-scrollbar" aria-labelledby="my-dropdown" style="border-radius: 0.rem;">
                        <h6 class="dropdown-header py-3 bg-light text-dark">
                            Choose Post Type
                        </h6>
                        @foreach ($posttypes as $posttype)
                            <a class="dropdown-item d-flex align-items-center py-2 select-post-parent" id="selectPostPostType" data-postTypeId="{{ $posttype->id }}" href="#">
                                <div>
                                    <span class="font-weight-bold text-capitalize">{{ $posttype->name }}</span>
                                </div>
                            </a>
                        @endforeach
                        <a class="dropdown-item text-center small text-gray-500 py-3" href=#">Show All Post Types</a>
                    </div>
                </div>
                @else
                    
                @endif
            <input type="hidden" name="post_post_type_id" value="{{ old('post_post_type_id') }}" id="postPostTypeIdInput" />
            </div>
        </div>
        <!-- Post Featured Image -->
        <div class="card mb-1 alert alert-light p-0">
            <img class="card-img-top" src="{{ ($post->post_featured_image != null) ? asset($post->post_featured_image) : asset('img/featured_image.png') }}" alt="Featured Image" id="postFeaturedImageHolder" />
            <div class="card-body p-2">
              <h6 class="card-title mb-0 text-dark font-weight-bold">Choose Featured Image</h6>
              <input type="file" name="post_featured_image" id="selectPostFeaturedImage" class="render-image-on-input-file-change" data-toggle="readImageAsDataURL" data-target="#postFeaturedImageHolder" hidden />
              <label for="selectPostFeaturedImage" class="custom-file-upload text-primary" data-toggle="tooltip" title="Change Featured Image">
                <i class="bx bx-sm bx-file"></i>
              </label>
              @if ($post->post_featured_image != null)
              <a href="" class="text-danger" id="removePostFeaturedImage" onclick="event.preventDefault(); document.getElementById('removePostFeaturedImageForm').submit();"><i class="bx bx-trash bx-sm"></i></a>
              @endif

                <small class="text-danger featured-image-error">
                    {{ $errors->first('post_featured_image') }}
                </small>
            </div>
        </div>

        <div class="card shadow-sm mb-3 d-none">
            <div class="card-header">
                <h6>Page Icon</h6>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <input type="file" name="page_icon" class="choose-icon-image" data-imgHolder="#iconImageHolderId" id="iconInput"  />
                    </div>
                    <div class="col-lg-6">
                        <select name="icon_format" id="iconFormat" class="form-control d-none">
                            <option value="img" selected>Image</option>
                            <option value="css_class">CSS Class</option>
                        </select>
                    </div>
                </div>
                <img src="{{ ($post->icon) ? asset($post->icon->icon) : asset('img/post_featured_image.png') }}" alt="" id="iconImageHolderId" class="w-25">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="card alert p-0 alert-light">
            <div class="card-body">
                <input type="submit" class="btn btn-sm btn-primary" value="Update" />
            </div>
        </div>

    </div>
    <div class="col-lg-12 text-center text-success success"></div>
    <div class="col-lg-12 text-center text-danger error"></div>
</form>