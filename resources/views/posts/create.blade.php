@extends('delgont::layout.master')

@section('title', 'Posts | Create')
@section('pageHeading', 'Create Post')

@section('requiredJs')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endsection

@section('actions-right')
    <a href="" class="" data-toggle="tooltip" title="Save Changes" onclick="event.preventDefault(); document.getElementById('createPostForm').submit();">
        <i class="bx bx-save bx-sm"></i>
    </a>
@endsection




@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <!-- Create Post Form -->
        @include('delgont::includes.forms.posts.create-post-form')
    </div>
</section>

@endsection