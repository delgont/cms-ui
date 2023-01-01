@if (count($posts))
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
            <th>LastUpdate</th>
            <th></th>
        </thead>
        <tbody>
           @foreach ($posts as $post)
            <tr>
                <td>
                    <input type="checkbox">
                </td>
                <td>{{ str_limit($post->post_title, 20) }}</td>
                <td>{{ ($post->author != null) ? $post->author->name : 'Undefined' }}</td>
                <td>{{ ($post->posttype) ? $post->posttype->name : 'Unspecified' }}</td>
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
                <td>{{ ($post->updated_at) ? $post->updated_at->toFormattedDateString() : '' }}</td>

                <td class="p-2">
                    <a href="{{ route('delgont.posts.edit', ['id' => $post->id]) }}" class="btn btn-sm text-primary p-1"><i class="bx bx-edit"></i> Edit</a>
                    <a href="{{ route('delgont.posts.create.duplicate', ['id' => $post->id]) }}" class="btn btn-sm text-primary"><i class="bx bx-duplicate"></i> Duplicate</a>
                    <a href="{{ route('delgont.posts.destroy', ['id' => $post->id]) }}" class="btn btn-sm text-danger"><i class="bx bx-trash"></i> Delete</a>
                </td>
            </tr>
            <tr class="d-none">
                <td colspan="10">fdf</td>
            </tr>
           @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
{{ (count($posts) > 1) ? $posts->links() : '' }}
<div>
</div>
@else
<div>
    no posts
</div>
@endif