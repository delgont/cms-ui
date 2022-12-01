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

                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h6>Admin Permissions</h6>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    @php
                                        $permissions = [];
                                        $manageUsersPermissions = lad_manage_users_permissions();
                                        $systemPermissions = config('lad.permissions', []);
                                    @endphp
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

                                            @foreach ($admin->permissions as $permission)
                                                @php array_push($permissions, $permission->permission) @endphp
                                            @endforeach

                                            <!-- Manage Users -->
                                            <div class="form-group form-check">
                                                <input type="checkbox" name="" id="manageUsers" class="form-check-input permission-checkbox" disabled />
                                                <label for="manageUsers" class="form-check-label permission-checkbox" data-toggle="collapse" href="#manageUsersPermissions">
                                                    <b>Manage Users </b><br />
                                                    <small>Ability to Add, Edit, View Delete & Edit user permissions</small>
                                                </label>
                                               
                                                <div class="collapsed" id="manageUsersPermissions">
                                                    @foreach ($manageUsersPermissions as $key => $value)
                                                    <div class="form-group form-check ">
                                                        <input type="checkbox" name="permission[]" id="{{ $key }}" value="{{ $key }}" class="form-check-input permission-checkbox" {{ (in_array($key, $permissions)) ? 'checked' : '' }} />
                                                        <label for="{{ $key }}" class="form-check-label">
                                                            <b>{{ $key }}</b>
                                                            <small>{{ $value }}</small>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div><hr />
                                            <!-- System Permissions -->
                                            @if (count($systemPermissions))
                                                @foreach ($systemPermissions as $key => $value)
                                                    @if ($value == null)
                                                        <h6 style="text-transform: capitalize;" class="mb-0">{{ str_replace('_', ' ', $key) }}</h6><br />
                                                    @else
                                                    <div class="form-group form-check">
                                                        <input type="checkbox" name="permission[]" id="{{ $key }}" value="{{ $key }}" class="form-check-input permission-checkbox" {{ (in_array($key, $permissions)) ? 'checked' : '' }} />
                                                        <label for="{{ $key }}" class="form-check-label">
                                                            <b>{{ $key }}</b>
                                                            <small>{{ $value }}</small>
                                                        </label>
                                                    </div><hr />
                                                    @endif
                                                @endforeach
                                            @endif

                                        @else
                                        <!-- Manage Users -->
                                        <div class="form-group form-check">
                                            <input type="checkbox" name="" id="manageUsers" class="form-check-input" />
                                            <label for="manageUsers" class="form-check-label" data-toggle="collapse" href="#manageUsersPermissions">
                                                <b>Manage Users </b>
                                                <small>Ability to Add, Edit, View Delete & Edit user permissions</small>
                                            </label>
                                            <div class="collapse" id="manageUsersPermissions">
                                                @foreach ($manageUsersPermissions as $key => $value)
                                                <div class="form-group form-check ">
                                                    <input type="checkbox" name="permission[]" id="{{ $key }}" value="{{ $key }}" class="form-check-input permission-checkbox permission-checkbox" />
                                                    <label for="{{ $key }}" class="form-check-label">
                                                        <b>{{ $key }}</b>
                                                        <small>{{ $value }}</small>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div><hr />
                                            <!-- System Permissions -->
                                            @if (count($systemPermissions))
                                                @foreach ($systemPermissions as $key => $value)
                                                    @if ($value == null)
                                                        <h6 style="text-transform: capitalize;" class="mb-0">{{ str_replace('_', ' ', $key) }}</h6><br />
                                                    @else
                                                    <div class="form-group form-check">
                                                        <input type="checkbox" name="permission[]" id="{{ $key }}" value="{{ $key }}" class="form-check-input permission-checkbox" />
                                                        <label for="{{ $key }}" class="form-check-label">
                                                            <b>{{ $key }}</b>
                                                            <small>{{ $value }}</small>
                                                        </label>
                                                    </div><hr />
                                                    @endif
                                                @endforeach
                                            @endif
                                           
                                        @endif
                                        <input type="submit" class="btn btn-sm btn-primary ml-3 mt-4" value="save" />
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 sticky-lg">
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