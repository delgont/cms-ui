@extends('delgont::layout.master')

@section('title', 'Edit Page')

@section('pageHeading', 'Edit Page')

@section('actions-right')
@if ($page->published)
<a href="{{ route('delgont.pages.unpublish', ['id' => $page->id]) }}" class="" data-toggle="tooltip" title="Unpublish Page">
    <i class="bx bx-x bx-sm"></i>
</a>
@else
<a href="{{ route('delgont.pages.publish', ['id' => $page->id]) }}" class="" data-toggle="tooltip" title="Publish Page">
    <i class="bx bx-check bx-sm"></i>
</a>
@endif

<a href="" class="" onclick="event.preventDefault(); document.getElementById('editPageForm').submit();" data-toggle="tooltip" title="Update Page">
    <i class="bx bx-save bx-sm"></i>
</a>
@endsection


@section('requiredJs')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endsection

@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
        <form action="{{ route('delgont.pages.update', ['id' => $page->id]) }}" class="row" id="editPageForm" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- page title, name and content -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <label for="title">Page Title</label>
                        <textarea name="page_title" id="title" class="form-control" placeholder="Page Title">{{ (old('page_title')) ? old('page_title') : $page->page_title }}</textarea>
                        <small class="text-danger page-title-error">{{ $errors->first('page_title') }}</small>
                        <textarea name="page_content" id="editor" class="form-control mt-4" cols="30" rows="10" placeholder="Page Body">{{ (old('page_content')) ? old('page_content') : $page->page_content }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Column 1 -->
            <div class="col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">

                        <!-- Page Key -->
                        @if (count($page_keys))
                        <label for="pageKey">Page Key</label>
                        <select name="page_key" id="" class="form-control">
                            @if ($page->page_key)
                                <option value="0">{{ _('Select Or Ignore') }}</option>
                                <option value="{{ $page->page_key }}" selected>{{ $page->page_key }}</option>
                                @for ($i = 0; $i < count($page_keys); $i++)
                                    <option value="{{ $page_keys[$i] }}">{{ $page_keys[$i] }}</option>
                                @endfor
                            @else
                                <option value="0" selected>{{ _('Select Or Ignore') }}</option>
                                @for ($i = 0; $i < count($page_keys); $i++)
                                    <option value="{{ $page_keys[$i] }}">{{ _($page_keys[$i]) }}</option>
                                @endfor
                            @endif
                        </select>
                        <small class="text-danger page-key-error">{{ $errors->first('page_key') }}</small>
                        @endif
                       

                        <!-- page Extract Text -->
                        <label for="extractText">Page Extract Text | Description</label>
                        <textarea name="extract_text" id="extractText" cols="30" rows="5" class="mt-2 form-control" placeholder="page Extract Text">{{ old('extract_text') }}</textarea>
                        <small class="text-danger page-extract-error">{{ $errors->first('extract_text') }}</small>
                        <small>
                            Extract Text are optional hand-crafted summaries of your page content that can be used in your website
                        </small>
                        @if (option('associate_page_with_posts', true))
                            <h6 class="text-capitalize mt-2 mb-1">Post Type</h6>
                            @if(count($postTypes))
                            <select name="post_type_id" id="" class="form-control text-capitalize">
                                <option value="0">select type</option>
                                @if ($page->posttype)
                                    <option value="{{ ($page->posttype) ? $page->posttype->id : '0' }}" selected>{{ ($page->posttype) ? $page->posttype->name : '' }}</option>
                                @endif
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
                        <h6 class="mb-2 text-capitalize">Categorize your page</h6>
                        @if (count($categories))
                            @foreach ($categories as $category)
                                <div class="form-check {{ ($category->parent_id) ? 'ml-3' : '' }}">
                                    <label class="form-check-label">
                                        @if (count($page->categories))
                                            @php
                                                $page_categories_ids = [];
                                            @endphp
                                            @foreach ($page->categories as $page_categories)
                                               @php
                                                   array_push($page_categories_ids, $page_categories->id)
                                               @endphp 
                                            @endforeach
                                            <input type="checkbox" class="form-check-input" name="category[]" id="{{ 'category'.$category->id }}" value="{{ $category->id }}" {{ (in_array($category->id, $page_categories_ids)) ? 'checked' : ''}}>
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

            

            <div class="col-lg-3">

                <!-- page Featured Image -->
                <div class="card shadow-sm mb-3">
                    <img src="{{ ($page->page_featured_image != null) ? asset($page->page_featured_image) : asset('img/featured_image.png') }}" alt="" id="pageFeaturedImageHolder" class="img-fluid card-img-top ">
                    <div class="card-body p-2">
                        <h6 class="card-title mb-2">Page Featured Image</h6>
                        <label for="selectpageFeaturedImage" class="custom-file-upload">
                            <i class="bx bx-sm bx-camera"></i>
                        </label>
                        <input type="file" name="page_featured_image" id="selectpageFeaturedImage" class="render-image-on-input-file-change" data-imgHolder="#pageFeaturedImageHolder" accept="image/*" hidden />
                        @if ($page->page_featured_image)
                            <a href=""><i class="bx bx-trash bx-sm"></i></a>
                        @endif
                        <small class="text-danger featured-image-error">
                            {{ $errors->first('page_featured_image') }}
                        </small>
                        <a class="text-primary d-none" data-toggle="collapse" href="#pageImageSize" aria-expanded="false" aria-controls="contentId">
                            Standard Recommended Image Sizes
                        </a>
                        <div class="collapse" id="pageImageSize">
                            <!-- here -->
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-3">
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
                        <img src="{{ ($page->icon) ? asset($page->icon->url) : asset('img/post_featured_image.png') }}" alt="" id="iconImageHolderId" class="w-25">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <input type="submit" value="Update" class="btn btn-sm btn-primary" />
                    </div>
                </div>

            </div>
            <div class="col-lg-12 text-center text-success success"></div>
            <div class="col-lg-12 text-center text-danger error"></div>
        </form>
    </div>
</section>
@endsection