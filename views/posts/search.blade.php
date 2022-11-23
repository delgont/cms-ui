@extends('delgont::layout.master')

@section('title', 'Posts')

@section('pageHeading', 'Posts Search Results')

@section('requiredJs')
<script src="{{ asset('stephendevs/pagman/js/posts.js') }}" defer></script>
@endsection


@section('actions-right')
<a href="{{ route('delgont.posts.create') }}" class="text-primary" data-toggle="tooltip" title="Add Post"><i class="bx bx-plus bx-sm"></i></a>
<a href="{{ route('delgont.posts.trash') }}" class="text-primary" data-toggle="tooltip" title="Trash"><i class="bx bx-trash-alt bx-sm"></i></a>
@endsection

@section('search')
    @include('delgont::includes.forms.search', ['action' => route('test')])
@endsection

@section('content')
<section class="mt-4">
    <div id="" class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if (count($posts))
                            @foreach ($posts as $post)
                            <div class="alert">
                                <h6>{{ $post->post_title }}</h6>
                                <p>{{ $post->extract_text }}</p>
                                <a href="{{ route('delgont.posts.edit', ['id' => $post->id]) }}" class=""><i class="bx bx-edit bx-sm"></i></a>
                                <a href="{{ route('delgont.posts.create.duplicate', ['id' => $post->id]) }}" class=""><i class="bx bx-duplicate bx-sm"></i></a>
                                <a href="{{ route('delgont.posts.destroy', ['id' => $post->id]) }}" class="text-danger"><i class="bx bx-trash bx-sm"></i></a>
                            </div>
                            @endforeach
                        @else
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection