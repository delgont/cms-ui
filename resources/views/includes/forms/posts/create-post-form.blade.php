<form action="{{ route('delgont.posts.store') }}" class="row" id="createPostForm" method="POST" enctype="multipart/form-data">
    @csrf
   
    <!-- Column 1 -->
    <div class="col-lg-3">
        <div class="card mb-3 p-0 alert alert-light border border-success">
            <div class="card-body">

                <!-- Post Type -->
                <label for="postType" class="text-dark font-weight-bold">Post Type</label>
                @if ($count = count($posttypes))
                    <input type="text" name="post_type" list="postTypeList" value="{{ old('posttype') }}" class="form-control" />
                    <datalist id="postTypeList">
                        @foreach ($posttypes as $posttype)
                            <option value="{{ $posttype->name }}">
                        @endforeach
                    </datalist>
                @else
                <input type="text" name="post_type" class="form-control">
                @endif
                <!-- Post Extract Text -->
                <label for="extractText" class="text-dark font-weight-bold">Post Extract Text | Description</label>
                <textarea name="extract_text" id="extractText" cols="30" rows="5" class="mt-2 form-control" placeholder="Post Extract Text">{{ old('extract_text') }}</textarea>
                <small class="text-danger post-extract-error">{{ $errors->first('extract_text') }}</small>
                <small>
                    Extract Text are optional hand-crafted summaries of your post content that can be used in your website
                </small>
                <br />
                <label for="slug" class="text-dark font-weight-bold">Url Slug</label>
                <input type="text" value="{{ old('slug') }}" name="slug" class="form-control" placeholder="Enter URL Slug" />
                <small class="text-danger">{{ $errors->first('slug') }}</small>
                
            </div>
        </div>
        <!-- Post Category -->
        <div class="card alert alert-info p-0 border border-info">
            <div class="card-body">
                <h6 class="mb-2 text-capitalize text-dark font-weight-bold">Categorize your post</h6>
                <small>Each post | page can belong to specific categories</small><br />
                @if (count($categories))
                    @foreach ($categories as $category)
                        <div class="form-check {{ ($category->parent_id) ? 'ml-3' : '' }}">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="category[]" id="{{ 'category'.$category->id }}" value="{{ $category->id }}">
                            {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                @else
                        <small class="font-weight-bold text-dark p-2">There are no categories for posts</small>
                        <a href="{{ route('delgont.posts.categories.create') }}" class="btn btn-sm p-1 btn-light my-2"><i class="bx bx-plus"></i> Add Category</a>
                @endif
            </div>
        </div>
    </div>

    <!-- post title, name and content -->
    <div class="col-lg-6">

        <div class="text-center">
            @includeIf('delgont::includes.dropdowns.choose-menu-dropdown', ['currentMenu' => 'Choose Menu'])
            @include('delgont::includes.dropdowns.choose-post-parent-dropdown', ['currentPostParent' =>'Choose Parent Post Or Page'])
            @includeIf('delgont::includes.dropdowns.choose-post-template-dropdown', ['currentPostTemplate' => 'Choose'])
        </div>

        <input type="hidden" name="template_id" value="{{ old('template_id') }}" id="templateIdInput" />
        <input type="hidden" name="parent_id" value="{{ old('parent_id') }}" id="parentIdInput" />
        <input type="hidden" name="menu_id" value="{{ old('menu_id') }}" id="menuIdInput" />


        <div class="card shadow-sm mb-3 p-0 alert alert-light mt-lg-2">
            <div class="card-body">
                <label for="title" class="text-dark font-weight-bold">Post Title</label>
                <textarea name="post_title" id="title" cols="10" rows="1" class="form-control" placeholder="Post Title">{{ old('post_title') }}</textarea>
                <small class="text-danger post-title-error">{{ $errors->first('post_title') }}</small>
            </div>
        </div>
        <div class="card shadow-sm alert p-0 alert-light">
            <div class="card-body p-0">
                <textarea name="post_content" id="editor" class="form-control mt-4" cols="30" rows="10" placeholder="Post Body">{{ old('post_content') }}</textarea>

            </div>
        </div>
    </div>

    <div class="col-lg-3">

         <!--Post Post types-->
         <div class="card mb-2 alert alert-light p-1 mt-4">
            <div class="card-body py-2">
                @if (count($posttypes) > 0)
                <small class="text-dark font-weight-bold">Choose the type of posts to show as listing on this Post | Page</small>
                <div class="dropdown">
                    <a id="my-dropdown" class="dropdown-toggle btn btn-sm btn-info border border-info my-2 font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span style="font-size: 14px;" class="text-capitalize" data-toggle="tooltip" title="Select Post Type">
                            {{ 'Choose Post Type' }}
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
        <div class="card mb-3 p-0 alert alert-light">
            <img class="card-img-top" src="{{ asset('img/featured_image.png') }}" alt="Featured Image" id="postFeaturedImageHolder" />
            <div class="card-body p-2">
              <h6 class="card-title mb-2 text-dark font-weight-bold">Choose Featured Image</h6>
              <input type="file" name="post_featured_image" id="selectPostFeaturedImage" data-toggle="readImageAsDataURL" data-target="#postFeaturedImageHolder" hidden />
              <label for="selectPostFeaturedImage" class="custom-file-upload btn btn-sm bg-transparent py-1 px-2 border-info  text-primary" data-toggle="tooltip" title="Choose Featured Image">
                  <i class="bx bx-file"></i> Choose Image
              </label>
                <small class="text-danger featured-image-error">
                    {{ $errors->first('post_featured_image') }}
                </small>
            </div>
        </div>

        <!-- Post Icon - posts may have icons or not -->
        @if (option('asign_icons_to_posts', true))
            <div class="card shadow-sm mb-3 d-none">
                <div class="card-header">
                    <h6 class="text-dark font-weight-bold">Post Icon</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <input type="file" name="post_icon" class="" id="iconInput" data-toggle="readImageAsDataURL"  />
                        </div>
                        <div class="col-lg-6">
                            <select name="icon_format" id="iconFormat" class="form-control d-none">
                                <option value="img" selected>Image</option>
                                <option value="css_class">CSS Class</option>
                            </select>
                        </div>
                    </div>
                    <img src="{{ asset('pagman/img/post_featured_image.png') }}" alt="" id="iconImageHolderId" class="w-25">
                </div>
            </div>
        @endif

        <div class="card">
            <div class="card-body p-2 text-right">
                <input type="submit" value="Save post" class="btn btn-md btn-primary" />
            </div>
        </div>
       

    </div>

    <div class="col-lg-12 mb-3">
        
    </div>

</form>