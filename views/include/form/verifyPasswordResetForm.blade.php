<form class="" method="POST" action="{{ route('lad.password.reset.link') }}">
    @csrf
    <div class="form-group">
        <input type="email" name="email" class="form-control mb-2 form-control-user text-center {{ (Session('failed')) ? ' is-invalid' : '' }}" value="{{ old('email') }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
        <small class="text-danger error">{{ $errors->first('email') }}</small>
    </div>

    <button type="submit" class="btn btn-warning btn-user btn-block mt-3">
        {{ __('Very Email') }}
    </button>

    <div class="p-4 text-center">
       <small>{{ (Session('message')) ? Session('message') : __('') }}</small>
    </div>
</form>