@extends('delgont::layout.master')

@section('title', 'Posts')

@section('pageHeading', 'Posts')

@section('requiredJs')
<script src="{{ asset('stephendevs/pagman/js/posts.js') }}" defer></script>
@endsection


@section('actions-right')
<a href="{{ route('delgont.posts.create') }}" class="text-primary p-1" data-toggle="tooltip" title="Add Post"><i class="bx bx-plus"></i> Create Post</a>
<a href="{{ route('delgont.posts.trash') }}" class="text-primary p-1" data-toggle="tooltip" title="Trash"><i class="bx bx-trash-alt"></i> Trash</a>
<a href="{{ route('delgont.posts.trash') }}" class="text-primary p-1" data-toggle="tooltip" title="Posts Settings"><i class="bx bx-cog"></i></a>
@endsection

@section('actions')
<div class="dropdown d-inline">
    <a id="my-dropdown" class="text-primary p-1 dev dropdown-toggle" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bx bx-tag"> Post Groups</i>
    </a>
    <div class="dropdown-menu p-0 custom-scrollbar scrollable" aria-labelledby="my-dropdown">
        <a class="dropdown-item py-2" href="#">Groups here</a>
    </div>
</div>
<div class="dropdown d-inline">
    <a id="my-dropdown" class="p-1 text-primary dropdown-toggle dev" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bx bx-tag"> Post Categories</i>
    </a>
    <div class="dropdown-menu custom-scrollbar scrollable p-0" aria-labelledby="my-dropdown">
        <a class="dropdown-item py-2" href="#">Categories here</a>
    </div>
</div>
@endsection

@section('search')
    @include('delgont::includes.forms.search', ['action' => route('delgont.posts.search')])
@endsection

@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            
        </div>
        <div class="row">
            <!-- Posts Table -->
            <div class="col-lg-12">
                <div class="card shadow-sm p-0 alert alert-light">
                    <div class="card-body">
                        @include('delgont::include.table.postsTable', ['posts' => $posts])
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection