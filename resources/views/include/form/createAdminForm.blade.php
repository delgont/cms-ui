
<form 
    action="{{ $formAttributes['action'] }}"  
    method="{{ $formAttributes['method'] }}" 
    enctype="{{ ($formAttributes['enctype'] == null) ? 'text/plain' : $formAttributes['enctype'] }}" 
    id="{{ ($formAttributes['id'] == null) ? 'createAdminForm' : $formAttributes['id']  }}" 
    data-useajax="{{ $formAttributes['data']['useAjax'] }}" 
    data-ajaxurl="{{ $formAttributes['data']['ajaxUrl'] }}" >
    @csrf

    <div class="form-group row">
        
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="firstName">{{ __('First Name') }}</label>
            <input type="text" name="first_name" class="form-control is-invalid" id="firstName" value="{{ old('first_name') }}" placeholder="Enter First name" />
            <small class="error_first_name text-danger error" id="errorFirstName">
                {{ $errors->first('first_name') }}
            </small>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <label for="lastName">{{ __('Last Name') }}</label>
            <input type="text" name="last_name" class="form-control" id="lastName" value="{{ old('last_name') }}" placeholder="Enter Last name" />
            <small class="error_last_name text-danger error" id="errorLastName">
                {{ $errors->first('last_name') }}
            </small>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" placeholder="Enter Username" />
            <small class="error_user_name text-danger error" id="errorUsername">
                {{ $errors->first('username') }}
            </small>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter Email" required />
            <small class="error_email_name text-danger error" id="errorEmail">
                {{ $errors->first('email') }}
            </small>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <label for="password">Email</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" />
            <small class="error-password text-danger error" id="errorPassword">
                {{ $errors->first('password') }}
            </small>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <label for="passwordConfirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="passwordConfirmation" placeholder="Confirm password" />
            <small class="error-password-confirmation text-danger error" id="errorPasswordConfirmation"></small>
        </div>

        <div class="col-lg-12" id="formBtnWrapper">
            <button type="submit" class="btn btn-sm">Save</button>
        </div>
        

    </div>
</form>