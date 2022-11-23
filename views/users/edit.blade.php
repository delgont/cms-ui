@extends('lad::core.layouts.master')

@section('title')
    Dashboard | Admins
@endsection


@section('pageHeading', 'Admin | '.$admin->first_name.' '.$admin->last_name)

@section('pageActions')
    <ul class="p-0">
        <li class="d-inline mr-2">
            <a href="{{ route('lad.admins') }}" class="btn btn-sm"><i class="fa fa-users icon"></i><span class="ml-1">Admins</span></a>
        </li>
        <li class="d-inline mr-2">
            <a href="{{ route('lad.admins') }}" class="btn btn-sm" data-toggle="modal" data-target="#createAdminModal"> <i class="fa fa-user-plus icon"></i><span class="ml-1">Register</span></a>
        </li>
    </ul>
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">

                <!-- Column -->
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body"></div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('lad.admins.update', ['id' => $admin->id]) }}" method="POST" class="row">
                                @csrf
                                <div class="col-lg-6 mt-2">
                                    <label for="username">{{ 'username' }}</label>
                                    <input type="text" name="username" placeholder="Username" value="{{ (old('username')) ? old('username') : $admin->user->name }}" class="form-control" />
                                </div>
                                <div class="col-lg-6 mt-2"></div>
                                <div class="col-lg-6 mt-2">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" value="{{ (old('first_name')) ? old('first_name') : $admin->first_name }}" class="form-control" />
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" value="{{ (old('last_name')) ? old('last_name') : $admin->last_name }}" class="form-control" />
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label for="email">Login Email</label>
                                    <input type="email" name="email" value="{{ (old('email')) ? old('email') : $admin->user->email }}" class="form-control" />
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <input type="submit" class="btn btn-md btn-primary" value="update" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="alert alert-primary alert-dismissible fade {{ session('updated') ? 'show' : 'd-none' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Holy guacamole!</strong> {{ session('updated') }}.
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    


@endsection