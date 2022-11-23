@extends('delgont::layout.master')

@section('title', 'Posts')

@section('pageHeading', 'Posts')

@section('requiredJs')
<script src="{{ asset('stephendevs/pagman/js/posts.js') }}" defer></script>
@endsection


@section('actions-right')
<a href="{{ route('delgont.posts.create') }}" class="text-primary" data-toggle="tooltip" title="Add Post"><i class="bx bx-plus bx-sm"></i></a>
<a href="{{ route('delgont.posts.trash') }}" class="text-primary" data-toggle="tooltip" title="Trash"><i class="bx bx-trash-alt bx-sm"></i></a>
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

            <!-- filter search posts select posts -->
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