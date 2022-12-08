@extends('delgont::layout.master')

@section('title', 'Dashboard | Section')
@section('pageHeading', 'Section')


@section('content')
<section class="mt-4 home">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4">
                <div class="card alert alert-light p-0">
                    <div class="card-body">
                        <form action="{{ route('delgont.templates.sections.settings.update', ['id' => $section->id]) }}" method="POST">
                            @csrf
                            @php
                                $posts_of_type = [];
                                $posts_of_category = [];
                            @endphp
                            @if (count($section->options))
                                @foreach ($section->options as $option)
                                    @if ($option->key === 'posts_of_type')
                                        @php $posts_of_type = $option->value; @endphp
                                    @endif
                                    @if ($option->key === 'posts_of_category')
                                        @php $posts_of_category = $option->value; @endphp
                                    @endif
                                @endforeach
                            @else
                                
                            @endif
                            
                            @if (count($postTYpes))
                                <div class="py-1">
                                    <h6 class="text-capitalize text-dark font-weight-bold mb-1">Posts of type</h6>
                                    <small class="text-primary">
                                        Select the type of posts to show on this view section!
                                    </small>
                                </div>
                                @foreach ($postTYpes as $type)
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="type[]" id="{{ 'type'.$type->id }}" value="{{ $type->id }}" {{ (in_array($type->id, $posts_of_type)) ? 'checked' : '' }}>
                                    <label for="{{ 'type'.$type->id }}" class="custom-control-label text-capitalize">{{ $type->name }}</label>
                                </div>
                                @endforeach
                            @else
                                
                            @endif

                            @if (count($categories))
                            <div class="py-1">
                                <h6 class="text-capitalize text-dark font-weight-bold mb-1">Posts of Category</h6>
                                <small class="text-primary">
                                    Select the type of posts to show on this view section!
                                </small>
                            </div>
                            @foreach ($categories as $category)
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="category[]" id="{{ 'category'.$category->id }}" value="{{ $category->id }}" {{ (in_array($category->id, $posts_of_category)) ? 'checked' : '' }}>
                                <label for="{{ 'category'.$category->id }}" class="custom-control-label text-capitalize">{{ $category->name }}</label>
                            </div>
                            @endforeach
                        @else
                            
                        @endif

                            <button type="submit">ok</button>
                            
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-2"></div>
            <div class="col-lg-5">
                <div class="card alert alert-light p-0 border border-light">
                    <div class="card-header py-2">
                        <h6 class="mb-0 text-dark">Section Settings</h6>
                    </div>
                    <div class="card-body mx-3">
                        <form action="" class="row">
                            <div class="form-group">
                                <label for="postOfTtype" class="text-capitalize text-dark font-weight-bold">type of posts</label><br class="mb-0"/>
                                <small class="text-primary">
                                     Aliquam numquam illum veniam deleniti autem, optio quas ea quisquam dolores exercitationem in accusantium quae reiciendis?
                                </small>
                                <select name="posts_of_type" id="" class="form-control w-50 mt-2">
                                    <option value="0">Select Post Type</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="postsOfCategory" class="text-capitalize text-dark font-weight-bold">posts of category</label><br class="mb-0"/>
                                <small class="text-primary">
                                     Aliquam numquam illum veniam deleniti autem, optio quas ea quisquam dolores exercitationem in accusantium quae reiciendis?
                                </small>
                                <select name="posts_of_category" id="" class="form-control w-75 mt-2">
                                    <option value="0">Select Post Category</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="postsOfCategory" class="text-capitalize text-dark font-weight-bold">custom CSS</label><br class="mb-0"/>
                                <small class="text-primary">
                                     Aliquam numquam illum veniam deleniti autem, optio quas ea quisquam dolores exercitationem in accusantium quae reiciendis?
                                </small>
                                <textarea name="" id="" cols="30" rows="4" class="form-control my-2"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection