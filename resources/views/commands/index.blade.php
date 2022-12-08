@extends('delgont::layout.master')

@section('title', 'Posts')

@section('pageHeading', 'Commands')

@section('requiredJs')
<script src="{{ asset('stephendevs/pagman/js/posts.js') }}" defer></script>
@endsection


@section('actions-right')
<a href="{{ route('delgont.posts.create') }}" class="text-primary" data-toggle="tooltip" title="Add Post"><i class="bx bx-plus bx-sm"></i></a>
<a href="{{ route('delgont.posts.trash') }}" class="text-primary" data-toggle="tooltip" title="Trash"><i class="bx bx-trash-alt bx-sm"></i></a>
@endsection



@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            
        </div>
        <div class="row">
            <div class="col-lg-4">
                <form action="{{ route('delgont.commands.run') }}" method="POST">
                    @csrf
                    <input type="text" name="command" class="form-control" value="{{ old('command') }}">
                    <input type="text" name="options" class="form-control">
                    <button type="submit">run</button>
                </form>

                <div>
                    {{ session('output') }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection