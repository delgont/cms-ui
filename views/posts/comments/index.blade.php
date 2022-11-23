@extends('delgont::layout.master')

@section('title', 'Posts | Comments')
@section('pageHeading', 'Post Comments')

@section('requiredJs')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endsection

@section('actions-right')
    <a href="{{ route('delgont.posts.create.duplicate', ['id' => $post->id]) }}" class="" data-toggle="tooltip" title="Duplicate Post"><i class="bx bx-duplicate bx-sm"></i></a>
    <a href="{{ route('delgont.posts.show', ['id' => $post->id]) }}" class="" data-toggle="tooltip" title="View Post"><i class="bx bx-show bx-sm"></i></a>
    <a href="{{ route('delgont.posts.edit', ['id' => $post->id]) }}" class="" data-toggle="tooltip" title="View Post"><i class="bx bx-edit bx-sm"></i></a>
@endsection



@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="card alert alert-light p-0 border-light">
                    <img src="{{ asset($post->post_featured_image) }}" class="card-img-top img-fluid rounded" alt="">
                    <div class="card-body p-2">
                        <h6 class="text-dark mb-1">{{ $post->post_title }}</h6>
                        <small class="text-primary">{{ $post->extract_text }}</small>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-5">
                <div class="row">

                    <div class="col-lg-12 comments custom-scrollbar scrollable  p-0" style="max-height: 350px;">
                        <div class="card border-light">
                            <div class="card-body p-4">
                                @if (count($post->comments))
                                    @foreach ($post->comments->reverse() as $comment)
                                    <div class="row alert alert-primary border-primary">
                                        <div class="col-lg-1">
                                            <div class="mr-2">
                                                <div class="rounded-circle">
                                                  <img src="{{ ($comment->commenter->avator) ? asset($comment->commenter->avator) : asset('img/default-avator.jpg') }}" alt="" class="navbar-img rounded-circle" style="width: 30px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="px-3 py-2">
                                                <span class="text-dark">{{ $comment->comment }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 offset-lg-2">
                                            @if (count($comment->replies))
                                                <div class="pb-3">
                                                    <small class="fonr-weight-bold">Replies</small>
                                                </div>
                                                @foreach ($comment->replies as $reply)
                                                    <div class="row alert alert-success rounded border-success">
                                                        <div class="col-lg-1">
                                                            <div class="mr-3">
                                                                <div class="rounded-circle">
                                                                  <img src="{{ ($reply->commenter->avator) ? asset($reply->commenter->avator) : asset('img/default-avator.jpg') }}" alt="" class="navbar-img rounded-circle" style="width: 30px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <div class="">
                                                                <span class="text-dark">{{ $reply->comment }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-0 alert alert-light mt-1">
                        <form action="{{ route('delgont.posts.comments.store', ['id' => $post->id]) }}" method="POST" class="">
                            @csrf
                            <textarea name="comment" id="" cols="30" rows="4" class="form-control mb-1"></textarea>
                            <input type="submit" value="Comment" class="btn btn-md btn-primary" />
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection