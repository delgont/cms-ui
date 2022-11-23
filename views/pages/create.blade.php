@extends('delgont::layout.master')

@section('title', 'Create Page')
@section('pageHeading', 'Create Page')


@section('requiredJs')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endsection

@section('actions-right')
<a href="" class="" onclick="event.preventDefault(); document.getElementById('createPageForm').submit();">
    <i class="bx bx-save bx-sm"></i>
</a>
@endsection


@section('actions')
    <a href="" class=""><i class="bx bx-menu bx-sm"></i></a>
    <a href="" class=""><i class="bx bx-trash bx-sm"></i><span class="badge badge-danger badge-counter">7</span></a>
@endsection


@section('content')
<section class="mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
        <form action="{{ route('delgont.pages.store') }}" class="row create-page-form" id="createPageForm" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- page title, name and content -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <label for="title">Page Title</label>
                        <textarea name="page_title" id="title" class="form-control" placeholder="Page Title">{{ old('page_title') }}</textarea>
                        <small class="text-danger page-title-error">{{ $errors->first('page_title') }}</small>
                        <textarea name="page_content" id="editor" class="form-control mt-4" cols="30" rows="10" placeholder="Page Body">{{ old('page_content') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Column 1 -->
            <div class="col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">

                        <!-- Page Key -->
                        @switch(option('page_key_mode'))
                            @case('strict')
                                 @if (count($page_keys))
                                    <label for="pageKey">Page Key <small>Strict Mode</small></label>
                                    <select name="page_key" id="" class="form-control">
                                        <option value="ignored" selected>{{ _('Select Or Ignore') }}</option>
                                        @for ($i = 0; $i < count($page_keys); $i++)
                                            <option value="{{ $page_keys[$i] }}">{{ _($page_keys[$i]) }}</option>
                                        @endfor
                                    </select>
                                    <small class="text-danger page-key-error-holder">{{ $errors->first('page_key') }}</small>
                                @endif
                                @break
                            @case('custom')
                                <label for="customPageKey">Page Key <small>Custom Mode</small></label>
                                <input type="text" name="page_key" id="customPageKey" placeholder="Enter Page Key" class="form-control" />
                                @break
                            @default
                                <label for="bothPageKeyMode">Page Key <small>Both Custom & Strict Mode</small></label>
                                <input type="text" name="page_key" id="bothPageKeyMode" placeholder="Enter Page Key" class="form-control" />
                                @break

                                
                        @endswitch
                       
                       

                        <!-- page Extract Text -->
                        <label for="extractText" class="mt-2">Page Extract Text | Description</label>
                        <textarea name="extract_text" id="extractText" cols="30" rows="5" class="mt-2 form-control" placeholder="page Extract Text">{{ old('extract_text') }}</textarea>
                        <small class="text-danger page-extract-error">{{ $errors->first('extract_text') }}</small>
                        <small>
                            Extract Text are optional hand-crafted summaries of your page content that can be used in your website
                        </small>

                        @if (option('associate_page_with_posts', true))
                            <h6 class="text-capitalize mt-2 mb-1">Post Type</h6>
                            @if(count($postTypes))
                            <select name="post_type_id" id="" class="form-control text-capitalize">
                                <option value="0" selected>select type</option>
                                @foreach ($postTypes as $posttype)
                                <option value="{{$posttype->id}}">{{$posttype->name}}</option>
                                @endforeach
                            </select>
                            @else
                            <small>Post types are unavailable <a href="{{ route('delgont.posts.posttypes') }}">Click</a>to create one </small>
                            @endif
                        @else
                            
                        @endif
                        

                        

                    </div>
                </div>

                <!-- Categorize you page -->
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 text-capitalize mt-2">Categorize your Page</h6>
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
                        <small>There no categories defined ... <a href="{{ route('delgont.categories') }}">click</a> to add.</small>
                        @endif
                    </div>
                </div>
            </div>

            

            <div class="col-lg-3">

                <!-- page Featured Image -->
                <div class="card mb-3">
                    <img src="{{ asset('img/featured_image.png') }}" alt="" id="pageFeaturedImageHolder" class="img-fluid card-img-top ">
                    <div class="card-body p-2">
                        <h6 class="card-title mb-2">Page Featured Image</h6>
                        <input type="file" name="page_featured_image" id="selectpageFeaturedImage" class="render-image-on-input-file-change" data-imgHolder="#pageFeaturedImageHolder" accept="image/*" />
                        <small class="text-danger featured-image-error">
                            {{ $errors->first('page_featured_image') }}
                        </small>
                    </div>
                </div>

                <div class="card shadow-sm mb-1">
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
                        <img src="{{ asset('img/featured_image.png') }}" alt="" id="iconImageHolderId" class="w-25">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <input type="submit" value="save" class="btn btn-sm btn-primary" />
                    </div>
                </div>

            </div>
            <div class="col-lg-12 text-center text-success success"></div>
            <div class="col-lg-12 text-center text-danger error"></div>
        </form>
    </div>
</section>
@endsection