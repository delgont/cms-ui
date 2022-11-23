@extends('delgont::layout.master')

@section('title', 'Post Types')
@section('pageHeading', 'Post Types')

@section('requiredJs')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endsection

@section('actions-right')
<a href="" data-toggle="tooltip" title="Synchronize Post Types"><i class="bx bx-sm bx-sync"></i></a>
@endsection



@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        @if (count($posttypes))
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th><input type="checkbox"></th>
                                        <th>Post Type</th>
                                        <th>Posts</th>
                                        <th>Created On</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($posttypes as $posttype)
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>{{ $posttype->name }}</td>
                                                <td>{{ $posttype->posts_count }}</td>
                                                <td>{{ $posttype->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('delgont.posts.posttypes.destroy', ['id' => $posttype->id]) }}" class="d-inline"><i class="bx bx-trash bx-sm text-danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No post types .... click on sync button to synchronise from configuration</p>
                            <a href="" class="btn btn-sm btn-primary"><i class="bx bx-sync bx-sm"></i></a>
                        @endif
                    </div>
                </div>
            </div>
    
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Create Post Type</h6>
                    </div>
                    <div class="card-body p-2">
                        <form action="{{ route('delgont.posts.posttypes.store') }}" class="create-posttype-form" id="createPostTypeForm" method="POST" >
                            @csrf
                            <input type="text" name="name" class="name form-control" placeholder="Enter Name" value="{{ old('name') }}" />
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                            <label for="parentId">Parent</label>
                            @if (count($posttypes))
                                <select name="parent_id" id="" class="form-control">
                                    <option value="0" selected>Choose Parent Post Type</option>
                                    @foreach ($posttypes as $posttype)
                                        <option value="{{ $posttype->id }}">{{ $posttype->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                            <hr />
                            <small class="d-none">Assign a page to these posts</small>
                            <br />
                            <button class="form-control" type="submit"><i class="bx bx-save"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection