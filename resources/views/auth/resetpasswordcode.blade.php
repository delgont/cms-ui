<!-- Admin authentication to the dashboard -->
@extends('ldashboard::core.layouts.empty')

@section('title')
Dashboard ! Password Reset
@endsection

@section('css')
<link href="{{ asset('ldashboard/css/auth.css') }}" rel="stylesheet">
<link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <section class="auth section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 offset-lg-4">
                    <div class="row">

                        <div class="col-lg-12 text-center">
                            <img src="{{ asset('storage/ldashboard/logo/logo.png') }}" alt="" class="img-fluid">
                        </div>

                        <div class="col-lg-12 mt-5">
                            <div class="login-form-wrapper p-5 shadow" id="loginFormWrapper">
                                <div class="p-3 text-center">
                                    <small style="font-size: 13px;">We sent an email  with the <span class="text-primary">Code</span> to reset your password to <span class="text-primary">{{ $email.'.'  }}</span> <hr />Enter Code to verify.</small>
                                </div>
                                @include('ldashboard::core.includes.forms.passwordResetCodeForm', ['some' => 'data'])
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="fixed-bottom developer section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <ul>
                        <li class="d-inline shadow"><a href="{{ config('ldashboard.developer.github') }}"><i class="fa fa-github"></i></a></li>
                        <li class="d-inline shadow"><a href="{{ config('ldashboard.developer.linkedin') }}"><i class="fa fa-linkedin"></i></a></li>
                        <li class="d-inline shadow"><a href="{{ config('ldashboard.developer.twitter') }}"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection