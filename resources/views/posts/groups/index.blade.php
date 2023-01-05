@extends('delgont::layout.master')

@section('title', 'Post Groups')
@section('pageHeading', 'Post Groups')

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

            <div class="col-lg-6 ">
                @if (count($groups))
                <div class="card alert alert-light p-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-stripped table-borderless">
                                <thead>
                                    <th>Name</th>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $group)
                                        <tr>
                                            <td><a href="{{ route('delgont.posts.groups.show', ['id' => $group->id]) }}">{{ $group->name }}</a></td>
                                            <td>
                                                <a href="" class="btn btn-sm text-primary"><i class="bx bx-edit"></i> Edit</a>
                                                <a href="{{ route('delgont.posts.groups.destroy', ['id' => $group->id]) }}" class="btn btn-sm text-primary"><i class="bx bx-edit"></i> Delete</a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    {{ $groups->links() }}
                </div>
                @else
                    
                @endif
            </div>

            <div class="col-lg-4 offset-lg-1 ">
                <div class="card p-0 alert alert-light">
                    <form action="{{ route('delgont.posts.groups.store') }}" method="POST" class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Group Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Group Name" />
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm m-2">Create Group</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection