@extends('ldashboard::core.layouts.master')

@section('title')
    Schlr Dashboard - Profile
@endsection


@section('pageheading')
    Account Profile
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row mt-4">

                <div class="col-lg-2 r-col">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body p-1">
                                    <ul class="list-group list-group-flush" style="font-size: 13px;">
                                        <li class="list-group-item header">Manage Account</li>
                                        <li class="list-group-item">Active Sessions</li>
                                        <li class="list-group-item">Account Settings</li>
                                        <li class="list-group-item">Activity Log</li>
                                        <li class="list-group-item"><a href="{{ route('lad.account.notifications') }}">Notifications</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 mid-col">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-9 text-center p-2">
                                    <small><i>{{ $account->username }}</i></small><hr />
                                    <small>You Are - {{ ($account->is_super) ? __('Super Admin') : __('Ordinary Admin') }}</small>
                                </div>
                                <div class="col-lg-3 order">
                                    <img src="{{ asset('stephendevs/lad/img/avator.jpg') }}" alt="Profile Image" class="img-fluid rounded-circle">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <form action="" method="POST" class="row">
                                @csrf
                                <div class="col-lg-6">
                                    <label for="username">UserName</label>
                                    <input type="text" name="username" class="form-control" id="usernameNameInput" value="{{ $account->username }}" />
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="emailNameInput" value="{{ $account->email }}" />
                                </div>
                                <div class="col-lg-6 pt-1">
                                    <button type="submit" class="btn btn-sm mt-4">save</button>
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-5">
                        <div class="card-header">
                            <h6>Password Management</h6>
                        </div>
                        <div class="card-body">
                            <button id="changePasswordButton" class="btn">Change Password</button>
                            <form action="" class="change-password-form pt-lg-3 row d-none" id="changePasswordForm">
                                <div class="col-lg-6">
                                    <input type="password" name="old_password" class="form-control" placeholder="Enter Old Password" class="" w-50 />
                                </div>
                                <div class="col-lg-6">
                                    <input type="password" name="new_password" class="form-control" placeholder="Enter New Password" class="" w-50 />
                                </div>
                                <div class="col-lg-6">
                                    <input type="password" name="confirm_new_password" class="form-control" placeholder="Confirm New Password" class="" w-50 />
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-sm">save</button>
                                </div>
                            </form>
                        </div>
                    </div>

            

                </div>

                <div class="col-lg-3 l-col">
                    <div class="row">
                        <div class="col-lg-12">
                            active sessions listed here
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
@endsection