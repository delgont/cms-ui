@extends('delgont::layout.master')

@section('title', 'Create User')

@section('pageHeading', 'Create New Admin')

@section('actions')
    <div class="dropdown show d-inline">
        <a class="dropdown-toggle" href="#" role="button" id="authorDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-group bx-sm"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="authorDropdown">
        <a class="dropdown-item" href="#"><small>Created By</small><span class="d-block">{</span></a>
        <a class="dropdown-item" href="#"><small>Last Update By</small><span class="d-block">/span></a>
        </div>
    </div>
    <a href="{{ route('delgont.admins.create') }}" class="" data-toggle="tooltip" title="Add New Admin"><i class="bx bx-plus bx-sm"></i> <span class="py-3"></span></a>
@endsection

@section('content')
<section class="create-admin-page mt-4" id="createAdminPage">

    <div class="container-fluid">
        <form action="{{ route('delgont.admins.store') }}" method="POST" class="row create-admin-form" id="createAdminForm">
            @csrf
            <div class="col-lg-3">

                <div class="card alert alert-light p-0">
                    <img class="card-img-top" src="{{asset('img/avator.jpg')}}" alt="Card image cap" id="avatorHolder" />
                    <div class="card-body p-3">
                      <h6 class="card-title mb-2 text-primary font-weight-bold">Choose File</h6>
                      <input type="file" name="avator" data-toggle="readImageAsDataURL" data-target="#avatorHolder" id="" />
                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="card mb-4 alert alert-light p-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{old('first_name')}}" id="firstName" />
                                <small class="text-danger first-name-error-holder" id="firstNameErrorHolder">{{$errors->first('first_name')}}</small>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Last Name" value="{{old('last_name')}}" />
                                <small class="text-danger last-name-error-holder">{{$errors->first('last_name')}}</small>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card mb-4 alert alert-light p-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}" id="username" />
                                <small class="text-danger username-error-holder" id="usernameErrorHolder">{{$errors->first('username')}}</small>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" value="{{old('email')}}" />
                                <small class="text-danger email-error-holder">{{$errors->first('email')}}</small>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card alert alert-light p-0">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-6 mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" />
                                <small class="error-password text-danger error" id="errorPassword">
                                    {{ $errors->first('password') }}
                                </small>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="passwordConfirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" />
                                <small class="error-password-confirmation text-danger error"></small>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-3">
                <button type="submit" class="create-user-form-button btn btn-md btn-primary" id="createUserFormButton">Register</button>
            </div>

        </form>
    </div>

</section>
@endsection