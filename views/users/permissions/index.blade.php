@extends('lad::core.layouts.master')

@section('title')
    Dashboard | Admins
@endsection


@section('pageHeading', 'Admin | '.$admin->user->name)

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

                <div class="col-lg-2 sticky-lg">
                    <div class="card shadow-sm">
                        <div class="card-body pl-1 pr-1 pt-0">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="">Active Sessions</a></li>
                                <li class="list-group-item"><a href="">Edit Permissions</a></li>
                                <li class="list-group-item"><a href="">Activity Log</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>Admin Permissions</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('lad.admins.permissions.add', ['id' => $admin->id]) }}" method="POST" id="permissionsForm">
                                @csrf
                                <div class="form-group form-check">
                                    <input type="checkbox" name="superUser" id="superUser" class="form-check-input" />
                                    <label for="superUser" class="form-check-label">
                                        <b>Super User Permission</b>
                                        <small>Access to entire system functionality</small>
                                    </label>
                                </div><hr />
                                @if (count($admin->permissions))
                                    @php
                                        $adminpermissionids = [];
                                    @endphp
                                    @foreach ($admin->permissions as $permission)
                                        @php array_push($adminpermissionids, $permission->permission_id) @endphp
                                    @endforeach

                                    @foreach ($permissions as $permission)
                                    <div class="form-group form-check ">
                                        <input type="checkbox" name="permission[]" id="{{ $permission->permission }}" value="{{ $permission->id }}" class="form-check-input permission-checkbox permission-checkbox" {{ (in_array($permission->id, $adminpermissionids)) ? 'checked' : '' }} />
                                        <label for="{{ $permission->permission }}" class="form-check-label">
                                            <b>{{ $permission->permission }}</b>
                                            <small>{{ $permission->description }}</small>
                                        </label>
                                    </div>
                                    @endforeach
                                    <input type="submit" name="update" class="btn btn-sm btn-primary ml-3 mt-4" value="update" />
                                @else
                                    @if (count($permissions))
                                        @foreach ($permissions as $permission)
                                        <div class="form-group form-check ">
                                            <input type="checkbox" name="permission[]" id="{{ $permission->permission }}" value="{{ $permission->id }}" class="form-check-input permission-checkbox permission-checkbox" />
                                            <label for="{{ $permission->permission }}" class="form-check-label">
                                                <b>{{ $permission->permission }}</b>
                                                <small>{{ $permission->description }}</small>
                                            </label>
                                        </div>
                                        @endforeach
                                        <input type="submit" name="save" class="btn btn-sm btn-primary ml-3 mt-4" value="save" />
                                    @endif
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 sticky-lg">
                    <div class="alert alert-primary alert-dismissible fade {{ (session('updated')) ? 'show' : 'd-none' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Holy guacamole!</strong> {{ session('updated') }}.
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            hello
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    
    

    @includeIf('ldashboard::core.includes.modals.createAdminModal', ['some' => 'data'])



@endsection