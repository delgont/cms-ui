@extends('delgont::layout.master')

@section('title', 'Posts - Trash')

@section('pageHeading', 'Posts | Trash')

@section('requiredJs')
<script src="{{ asset('stephendevs/pagman/js/posts.js') }}" defer></script>
@endsection


@section('actions-right')
<a href="{{ route('delgont.posts.create') }}" class="text-primary" data-toggle="tooltip" title="Add Post"><i class="bx bx-plus bx-sm"></i></a>
@endsection


@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if (count($posts))
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <th>
                                            <input type="checkbox">
                                        </th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Post Type</th>
                                        <th>Category</th>
                                        <th>CreatedOn</th>
                                        <th>DeletedOn</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                       @foreach ($posts as $post)
                                        <tr>
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>{{ $post->post_title }}</td>
                                            <td>{{ ($post->author != null) ? $post->author->name : 'System' }}</td>
                                            <td>{{ ($post->posttype) ? $post->posttype->name : '' }}</td>
                                            <td>
                                                @if (count($post->categories))
                                                    @foreach ($post->categories as $category)
                                                        <small>{{ $category->name }}</small>
                                                    @endforeach
                                                @else
                                                    <small>no categories</small>
                                                @endif
                                            </td>
                                            <td>{{ ($post->created_at) ? $post->created_at->toFormattedDateString() : '' }}</td>
                                            <td>{{ ($post->deleted_at) ? $post->deleted_at->toFormattedDateString() : '' }}</td>
                            
                                            <td>
                                                <a href="{{ route('delgont.posts.trash.restore', ['id' => $post->id]) }}"" class="text-success">Restore</a>
                                                <a href="{{ route('delgont.posts.trash.destroy', ['id' => $post->id]) }}" class="text-danger"><i class="bx bx-trash bx-sm"></i></a>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                            {{ (count($posts) > 1) ? $posts->links() : '' }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection