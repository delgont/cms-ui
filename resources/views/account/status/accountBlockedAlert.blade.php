<!-- Admin authentication to the dashboard -->
@extends('ldashboard::core.layouts.empty')

@section('title')
    Ldashboard Account Blocked
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

                        <div class="col-lg-12 mt-5">
                           <div class="card shadow-sm text-center">
                               <div class="card-body">
                                   <div class="alert alert-danger" role="alert">
                                       <strong>Account Blocked</strong>
                                   </div>
                                   <div class="p-3">
                                       <p>
                                           Your account has been blocked, <hr />We will send you a notification when your account is unblocked.
                                       </p>
                                       <a href="{{ route('ldashboardLogout') }}" class="btn btn-md btn-success" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                         Logout
                                    </a>
                                    <form id="logoutForm" action="{{ route('ldashboardLogout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                   </div>
                               </div>
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