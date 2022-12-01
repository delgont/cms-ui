<!-- Admin authentication to the dashboard -->
@extends('ldashboard::core.layouts.empty')

@section('title', 'Dashboard | Password Reset')

@section('requiredCss')
<link href="{{ asset('stephendevs/lad/css/auth.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="auth section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">

                    <div class="col-lg-6 text-center pt-5 mb-5">
                        <h1>Password Reset</h1><hr />
                    </div>

                    <div class="col-lg-4 pt-5">
                        <div class="resetpwd-form-wrapper p-5 shadow" id="loginFormWrapper">
                            <div class="p-3 text-center" style="font-size: 15px;">
                                <small>
                                    Enter email address you use to login to your admin dasboard!
                                </small>
                            </div>
                            @includeIf('lad::core.includes.forms.verifyPasswordResetForm', ['some' => 'data'])
                            {{ Session('failed') }}
                            <div class="p-1 text-right">
                                <small>
                                    <a href="{{ route('lad.login') }}" class="btn btn-sm btn-success border-0"><i class="fa fa-arrow-left mr-1"></i>{{ __('Back to login') }}</a>
                                </small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

   

<section class="fixed-bottom developer section-padding shadow-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-right">
                <h6 class="mb-0">Developed by</h6>
                <small>
                    <a href="https://twitter.com/stephendevs" target="_blank">Stephendevs</a>
                </small>
            </div>
            <div class="col-lg-6 text-left links">
                <a href="https://twitter.com/stephendevs" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://github.com/stephendevs" target="_blank" class="google-plus"><i class="fa fa-github"></i></a>
                <a href="https://www.linkedin.com/in/stephendevs" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection