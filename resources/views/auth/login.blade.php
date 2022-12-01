<!-- Admin authentication to the dashboard -->
@extends('delgont::layout.empty')

@section('title', 'Login')

@section('content')
<section class="fixed-top heading" id="heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center py-3">
                <img src="{{ asset('img/logo.png') }}" class="mb-2 d-none" alt="lad logo">
                <h3 class="mb-1"><span class="text-primary">Delgont</span> <span class="text-danger">Cms</span></h3>
            </div>
        </div>
    </div>
</section>
<section class="auth">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 offset-lg-1 text-center">
                <img src="{{ asset('img/delgont-login.svg') }}" alt="" class="img-fluid mb-5">
            </div>

            <div class="col-lg-4 offset-lg-1">
                <div class="login-form-wrapper p-5 shadow-lg border-secondary" id="loginFormWrapper">
                    @include('delgont::include.form.loginForm', ['some' => 'data'])
                </div>
            </div>


        </div>
    </div>
</section>
<footer class="fixed-bottom developer shadow-sm">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-right">
                <h6 class="mb-0">Developed by</h6>
                <small>
                    <a href="https://github.com/delgont" target="_blank">Delgont Technologies</a>
                </small>
            </div>
            <div class="col-lg-3 text-left links">
                <a href="https://twitter.com/stephendevs" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://github.com/stephendevs" target="_blank" class="google-plus"><i class="fa fa-github"></i></a>
                <a href="https://www.linkedin.com/in/stephendevs" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="https://www.buymeacoffee.com/stephendevs" target="_blank" class="linkedin"><i class="fa fa-coffee"></i></a>
            </div>
            <div class="col-lg-3 text-right">
                <h6 class="mb-0">Powered by</h6>
                <small>
                    <a href="">Laravel | Bootstrap 4</a>
                </small>
            </div>
            <div class="col-lg-3 text-left links">
                <a href="https://github.com/laravel" target="_blank" class="google-plus"><i class="fa fa-github"></i></a>
            </div>
        </div>
    </div>
</footer>
@endsection