<div class="dropdown d-inline show mr-1">
    <a id="my-dropdown" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class='bx bx-layout bx-sm text-dark' data-toggle="tooltip" title="Choose Template"></i>
    </a>
    <div class="dropdown-menu dropdown-list shadow-lg animated--grow-in p-0 scrollable custom-scrollbar" aria-labelledby="my-dropdown" style="border-radius: 0.rem;">
        <h6 class="dropdown-header py-3 bg-light text-dark">
            Choose Parent Post
        </h6>
        <div class="">
            @if (count($posts))
            @foreach ($posts as $post)
                <a class="dropdown-item d-flex align-items-center py-2 select-post-parent" id="selectPostParent" data-parentId="{{ $post->id }}" data-parent="{{ $post->post_title }}" href="#">
                    <div>
                        <span class="font-weight-bold text-capitalize">{{ str_limit($post->post_title, 20) }}</span>
                        <div class="small text-gray-500">The description of the template</div>
                    </div>
                </a>
            @endforeach
        @else
            
        @endif
        </div>
        <a class="dropdown-item text-center small text-gray-500 py-3" href=#">Show All Posts</a>
    </div>
</div>
