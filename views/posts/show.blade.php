@extends('delgont::layout.master')

@section('title', 'Posts | Edit')
@section('pageHeading', 'Edit Post')

@section('requiredJs')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endsection


@section('actions')
<a href="" class="" data-toggle="tooltip" title="Author"><i class="bx bx-user bx-sm"></i></a>
@if ($post->comments)
    <a href="{{ route('delgont.posts.comments', ['id' => $post->id]) }}" class="" data-toggle="tooltip" title="Comments"><i class="bx bx-comment bx-sm"></i><span class="badge badge-danger badge-counter">{{ $post->comments_count }}</span></a>
@endif
@endsection

@section('actions-right')
    <a href="{{ route('delgont.posts.destroy', ['id' => $post->id]) }}" class="" data-toggle="tooltip" title="Delete Post"><i class="bx bx-trash bx-sm"></i></a>
    <a href="{{ route('delgont.posts.edit', ['id' => $post->id]) }}" class="" data-toggle="tooltip" title="Edit Post"><i class="bx bx-edit bx-sm"></i></a>
@endsection



@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-7">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <h4 class="mb-1">{{ $post->post_title }}</h4>
                                <small>{{ $post->extract_text }}</small><hr />
                                <div>
                                    @if (count($post->categories))
                                        @foreach ($post->categories as $category)
                                            <div class="d-inline p-1"><i class="bx bx-tag"></i> {{ $category->name }}</div>
                                        @endforeach
                                    @else
                                        
                                    @endif
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        {!! $post->post_content !!}
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card">
                    <img class="card-img-top" src="{{ ($post->post_featured_image != null) ? asset($post->post_featured_image) : asset('img/featured_image.png') }}" alt="Featured Image" id="postFeaturedImageHolder" />
                    <div class="card-body">
                      <h6 class="card-title mb-2">Choose Featured Image</h6>
                      <input type="file" name="post_featured_image" id="selectPostFeaturedImage" class="render-image-on-input-file-change" data-imgHolder="#postFeaturedImageHolder" /><hr />
                        <small class="text-danger featured-image-error">
                            {{ $errors->first('post_featured_image') }}
                        </small>
                    </div>
                </div>

            </div>
        </div>        
    </div>
</section>

@endsection