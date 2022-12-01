@extends('delgont::layout.master')

@section('title', 'Dashboard | Section')
@section('pageHeading', 'Section')


@section('content')
<section class="mt-4 home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4"></div>
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