<!-- Admin authentication to the dashboard -->
@extends('delgont::layout.empty')

@section('title', 'Account Password Management')

@section('content')
<section class="p-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="row">
                <div class="col-lg-3 text-lg-center">
                    <a href="{{ route('delgont.account') }}" class=""><i class='bx bx-arrow-back bx-lg'></i></a>
                    <img src="{{ (auth()->user()->avator) ? asset(auth()->user()->avator->url) : asset('img/default-avator.jpg') }}" alt="" class="rounded-circle img-fluid mb-2 mt-4">
                    <h6>{{ auth()->user()->name }}</h6>
                </div>
                <div class="col-lg-5 text-center">
                    <h5>Change Password</h5>
                    <form action="{{ route('delgont.account.password.update') }}" method="POST" id="updateAccountPasswordForm" class="update-account-password-form">
                        @csrf
                        <form action="" class="pt-4 pr-4">
                            <input type="password" name="old_password" class="form-control mb-1" placeholder="Enter Old Password" value="{{ old('old_password') }}" />
                            <small class="text-danger">{{ $errors->first('old_password') }}</small>
                            <input type="password" name="password" class="form-control mb-1" placeholder="Enter New Password" value="{{ old('password') }}" />
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password" />
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                            <button type="submit" class="btn btn-sm w-100 btn-danger mt-2 w-75">Change Password</button>

                        </form>
                   </form>
                </div>
            </div>
            
        </div>
        
    </div>
</section>
@endsection