@extends('delgont::layout.master')

@section('title', 'Account - '.$account->name)


@section('pageHeading')
    Your Account
@endsection

@section('actions-right')
@endsection


@section('content')
<section class="mt-3 account">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-2">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ ($account->avator) ? asset($account->avator->url) : asset('img/default-avator.jpg') }}" alt="" class="img-fluid rounded-circle avator-holder avator">
                        <form action="{{ route('delgont.account.change.avator') }}" method="POST" class="edit-account-avator" id="editAccountAvator" enctype="multipart/form-data">
                            @csrf
                            <label for="fileUpload" class="custom-file-upload">
                                <i class="bx bx-sm bx-camera"></i>
                            </label>
                            <input id="fileUpload" class="render-image-on-input-file-change" type="file" name="avator"  data-imgholder=".avator-holder" hidden />
                            <input type="submit" class="btn btn-sm btn-success d-none " id="avatorChangeBtn" value="Apply" />
                            <small id="success" class="text-success"></small>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <img src="{{ ($account->avator) ? asset($account->avator->url) : asset('img/default-avator.jpg') }}" alt="" class="img-fluid rounded-circle avator-sm" />
                            </div>
                            <div class="col-lg-5">
                                <h3 class="mb-1">{{ $account->name }}</h3>
                                <a href="" class="d-none"><span class="badge badge-danger mr-2">3</span><small class="text-danger">Active Sessions</small></a><br />
                                <h6 class="mb-0">Roles</h6>
                                @if (count($account->roles))
                                    @foreach ($account->roles as $role)
                                        <small class="mr-lg-1 text-capitalize badge badge-light p-1">{{ __($role->role) }}</small>
                                    @endforeach
                                @else
                                    <small>There are no roles assigned to you</small>
                                @endif
                            </div>
                        </div>
                        <hr />
                        <form action="" class="row pt-3 ">
                            <div class="col-lg-5">
                                <label for="username">Change Username</label>
                                <input type="text" name="name" class="form-control outline-primary" value="{{ (old('name')) ? old('name') : $account->name }}">
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                <button type="submit" class="btn btn-success btn-sm mt-1"><i class="bx bx-edit"></i> Apply Changes</button>
                            </div>
                            <div class="col-lg-7">
                            </div>
                        </form>
                        <hr />
                        <form action="" class="row edit-account-form pt-3" id="editAccountForm">
                            <div class="col-lg-6">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control outline-primary" value="Stephen Okello">
                            </div>
                            <div class="col-lg-6">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control outline-primary" value="Stephen Okello">
                            </div>
                            <div class="col-lg-12 mt-2">
                                <small><b>Authentication Details</b></small><hr />
                            </div>
                            <div class="col-lg-8">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="{{ $account->email }}" />
                            </div>
                            <div class="col-lg-4">
                            </div>
                            <div class="col-lg-12 text-lg-right mt-3">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                     <div class="card-body">
                         <ul class="nav flex-column text-lg-left">
                             <li class="nav-item">
                               <a class="nav-link active" href="{{ route('delgont.account') }}"><i class="bx bx-user"></i> Account Profile</a>
                             </li>
                             
                             <li class="nav-item"><a href="{{ route('delgont.account.activitylog') }}" class="nav-link"><i class='bx bx-id-card'></i> Activity Log</a></li>
                             <li class="nav-item"><a href="{{ route('delgont.account.notifications') }}" class="nav-link"><i class='bx bx-bell'></i> Notifications</a></li>
                             <li class="dropdown nav-item">
                                <a class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bx-shield-alt-2'></i> Security
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{ route('delgont.account.password') }}">Password Management</a>
                                </div>
                            </li>
                         </ul>
                     </div>
                </div>
             </div>


        </div>
    </div>
</section>
    
@endsection