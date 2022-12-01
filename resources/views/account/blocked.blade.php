@extends('dashboard.core.layouts.dashboard')

@section('title')
    Schlr Dashboard
@endsection

@section('content')
        <section class="dev">
            <div class="container">
                <div class="inner-dev">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Schlr Account Blocked</h2>
                        </div>
                        <div class="col-lg-12">
                            <img src="{{ asset('storage/'.$blockedAccount->profile_image) }}" alt="Profile Image" class="admin-profile-image profile-image profile-image-medium" />
                            <ul>
                                <li class="text-danger">{{ $blockedAccount->first_name.' '.$blockedAccount->last_name }}</li>
                                <li class="text-primary">{{ $blockedAccount->username }}</li>
                                <li class="text-dark">{{ $blockedAccount->email }}</li>
                                <li class="text-success"><small>{{ $blockedAccount->created_at }}</small></li>
                                <li class="text-success"><small>{{ $blockedAccount->created_at }}</small></li>
                                <li class="text-success"><small>{{ $blockedAccount->created_at }}</small></li>
                            </ul>
                            <h6>Block Details</h6>
                            <ul>
                                <li class="text-primary">{{ $blockedAccount->blockDetail->id }}</li>
                                <li class="text-danger">{{ $blockedAccount->blockDetail->admin_id }}</li>
                                <li class="text-dark">Reason: {{ $blockedAccount->blockDetail->block_message}}</li>
                                <li class="text-success">{{ $blockedAccount->blockDetail->blocked_by }}</li>
                                <li class="text-alert">{{ $blockedAccount->blockDetail->id }}</li>
                                <li class="text-danger">
                                    <a href="{{ route('ldashboardLogout') }}" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a>
                                    <form id="logoutForm" action="{{ route('ldashboardLogout') }}" method="POST" style="display: none;">
                                        @csrf
                                   </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection