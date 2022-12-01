<form class="login-form" method="POST" action="{{ route('delgont.login') }}">
    @csrf
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-user {{ (Session('failed')) ? ' is-invalid' : '' }}" value="{{ old('email') }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
        @if ($errors->has('email'))
            <span class="invalid-feedback error" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-user {{ (Session('failed')) ? ' is-invalid' : '' }}" id="exampleInputPassword" placeholder="Password" required />
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <div class="custom-control custom-checkbox small">
        <input type="checkbox" class="custom-control-input form-check-input" id="customCheck" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
        <label class="custom-control-label text-darkr" for="customCheck">{{ __('Remember Me') }}</label>
    </div>

    <button type="submit" class="btn btn-primary rounded btn-user btn-block mt-3">
        {{ __('SignIn') }}</i>
    </button>

    <div class="p-2 text-center">
       <small>{{ (Session('message')) ? Session('message') : __('') }}</small>
       <hr /><a href="{{ route('delgont.password.resetEmailForm') }}" class="text-dark">Forgot Password</a>
    </div>
</form>