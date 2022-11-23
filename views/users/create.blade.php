@extends('delgont::layout.master')

@section('title', 'Create User')

@section('pageHeading', 'Create New User')


@section('content')
<section class="create-admin-page" id="createAdminPage">

    <div class="container-fluid">
        <form action="" class="row create-user-form" id="createUserForm">
            <div class="col-lg-3">

                <div class="card h-100">
                    <img class="card-img-top" src="{{asset('img/avator.jpg')}}" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title mb-2">Choose File</h5>
                      <input type="file" name="avator" id="" />
                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" placeholder="Username" value="{{old('username')}}" id="username" />
                                <small class="text-danger username-error-holder" id="usernameErrorHolder">{{$errors->first('username')}}</small>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" id="email" placeholder="Email Address" value="{{old('email')}}" />
                                <small class="text-danger email-error-holder">{{$errors->first('email')}}</small>
                            </div>

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
                <div class="card p-0">
                    <div class="card-body p-0">
                        <button type="submit" class="create-user-form-button btn btn-md btn-primary" id="createUserFormButton">Save User</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

</section>
@endsection