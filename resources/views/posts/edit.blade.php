@extends('delgont::layout.master')

@section('title', 'Posts | Edit')
@section('pageHeading', 'Edit Post')

@section('requiredJs')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endsection

@section('search')
    @include('delgont::includes.forms.search', ['action' => route('delgont.posts.search')])
@endsection

@section('actions')
    <div class="mr-5 d-none">
        @include('delgont::includes.dropdowns.choose-post-parent-dropdown', ['currentPostParent' => ($post->parent) ? $post->parent->post_title : 'Choose Parent Post Or Page'])
        @includeIf('delgont::includes.dropdowns.choose-post-template-dropdown', ['currentPostTemplate' => ($post->template) ? $post->template->name : 'Choose'])
    </div>
    
    <div class="dropdown show d-inline">
        <a class="dropdown-toggle" href="#" role="button" id="authorDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-group bx-sm"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="authorDropdown">
        <a class="dropdown-item" href="#"><small>Created By</small><span class="d-block">{{ ($post->author != null) ? $post->author->name : 'System' }}</span></a>
        <a class="dropdown-item" href="#"><small>Last Update By</small><span class="d-block">{{ ($post->updatedBy) ? $post->updatedBy->name : '' }}</span></a>
        </div>
    </div>

    <!-- Comments Dropdown -->
    <div class="dropdown show d-inline">
        <a href="#" class="dropdown-toggle" href="#" role="button" id="downloadablesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-comment bx-sm text-dark"></i>
            <span class="badge badge-danger badge-counter">{{ $post->comments_count }}</span>
        </a>
        <div class="dropdown-menu dropdown-list shadow-smcustom-scrollbar scrollable p-0" aria-labelledby="authorDropdown">
            <h6 class="dropdown-header bg-light text-primary font-weight-bold border-bottom border-light">
                Post Comments
            </h6>
            @if (count($post->comments))
                @foreach ($post->comments->reverse() as $comment)
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-2">
                          <div class="rounded-circle">
                            <img src="{{ ($comment->commenter->avator) ? asset($comment->commenter->avator) : asset('img/default-avator.jpg') }}" alt="" class="navbar-img rounded-circle" style="width: 22px;">
                          </div>
                        </div>
                        <div>
                        <span class="font-weight-bold">{{ $comment->commenter->name }}</span><br />
                        <small class="d-inline-block">{{ str_limit($comment->comment, 15) }}</small><br />
                        <small class="small text-primary d-inline-block">December 12, 2019</small>
                        </div>
                      </a>
                @endforeach
            @else
                <div class="px-3 py-3 text-dark">
                    There are no comments for this post .......
                </div>
            @endif
            <a class="dropdown-item text-center small text-gray-500" href="{{ route('delgont.posts.comments', ['id' => $post->id]) }}">Show All Comments</a>
        </div>
    </div>

@endsection

@section('actions-right')
    @if ($post->published)
        <a href="{{ route('delgont.posts.unpublish', ['id' => $post->id]) }}" class="" data-toggle="tooltip" title="Unpublish Post">
            <i class="bx bx-x bx-sm text-danger"></i>
        </a>
    @else
        <a href="{{ route('delgont.posts.publish', ['id' => $post->id]) }}" class="" data-toggle="tooltip" title="Publish Post">
            <i class="bx bx-check bx-sm text-primary"></i>
        </a>
    @endif
    <a href="" class="" data-toggle="tooltip" title="Save Changes" onclick="event.preventDefault(); document.getElementById('editPostForm').submit();">
        <i class="bx bx-save bx-sm text-info"></i>
    </a>
    <a href="{{ route('delgont.posts.create.duplicate', ['id' => $post->id]) }}" class="" data-toggle="tooltip" title="Duplicate Post"><i class="bx bx-duplicate bx-sm"></i></a>
    <a href="{{ route('delgont.posts.show', ['id' => $post->id]) }}" class="" data-toggle="tooltip" title="View Post"><i class="bx bx-show bx-sm"></i></a>
    <a href="{{ route('delgont.posts.show', ['id' => $post->id]) }}" class="" data-toggle="tooltip" title="Post Settings"><i class="bx bx-cog bx-sm"></i></a>
@endsection


@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <!-- Edit Post Form -->
        @includeIf('delgont::includes.forms.posts.edit-post-form', ['some' => 'data'])
    
    </div>
</section>

<section id="app">

</section>

<form action="{{ route('delgont.posts.destroy.featuredimage', ['id' => $post->id]) }}" method="POST" id="removePostFeaturedImageForm">
    @csrf
</form>

<div class="post-settings scrollable custom-scrollbar alert alert-white bg-white border border-light shadow-sm d-none">
</div>

@endsection
