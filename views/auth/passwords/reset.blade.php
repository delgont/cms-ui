<!-- Admin authentication to the dashboard -->
@extends('lad::core.layouts.empty')

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
                        <h1>Change Password</h1><hr />
                    </div>

                    <div class="col-lg-4 pt-3">
                        <div class="shadow p-5">
                            @include('lad::core.includes.forms.passwordResetForm', ['some' => 'data'])
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