@extends('delgont::layout.master')

@section('title', 'Categories')
@section('pageHeading', 'Categories')


@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-primary alert-dismissible" role="alert">
                            Categories help you group your content such as — pages, posts, users & media. eg you may have blog posts under diferent categories.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @if (count($categories))
                            <table class="table table-borderless table-inverse table-responsive">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>pages</th>
                                        <th>Posts</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td scope="row">{{ $category->name }}</td>
                                                <td>{{ ($category->description) ? $category->description : 'No description' }}</td>
                                                <td>{{ $category->pages_count }}</td>
                                                <td>{{ $category->posts_count }}</td>
                                                <td>
                                                    <a href="{{ route('delgont.categories.destroy', ['id' => $category->id]) }}" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></a>
                                                    <a href="{{ route('delgont.categories.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-primary"><i class="bx bx-edit"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                            </table>
                        @else
                            
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('delgont.categories.store')}}" method="POST" autocomplete="off" id="createCategoryForm">
                            @csrf
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{ old('name') }}" id="name" />
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description') }}</textarea>
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                            <label for="parent">Parent Category</label>
                            <select name="parent" id="parent" class="form-control">
                                <option value="{{ null }}" selected>Select Parent</option>
                                @if (count($categories))
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <button type="submit" class="btn btn-md btn-primary float-right mt-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection