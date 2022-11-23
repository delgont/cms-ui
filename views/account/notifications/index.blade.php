@extends('delgont::layout.master')

@section('title', 'Account - Notifications')


@section('pageHeading')
    Notifications
@endsection

@section('actions-right')
@endsection


@section('content')
<section class="mt-3">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-2">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ (auth()->user()->avator) ? asset(auth()->user()->avator->url) : asset('img/default-avator.jpg') }}" alt="" class="img-fluid rounded-circle avator-holder">
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                       @if (count($notifications))
                           @foreach ($notifications as $notification)
                               <div class="row {{ ($notification->read_at) ? 'bg-light' : '' }} p-3 border-top border-primary">
                                    <div class="col-lg-1 pt-lg-2">
                                        <input type="checkbox">
                                    </div>
                                    <a class="col-lg-1"><i class="bx bx-bell bx-sm"></i></a>
                                    <a href="{{ route('delgont.account.notifications.show', ['id' => $notification->id]) }}" class="col-lg-8">
                                        <p class="mb-0">{{ $notification->data['message'] }}</p>
                                    </a>
                                    <div class="col-lg-2">
                                        <a href="{{ route('delgont.account.notifications.destroy', ['id' => $notification->id]) }}" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></a>
                                    </div>
                                    <div class="col-lg-11 offset-lg-1">
                                        <small><a href="" class="text-success">Mark As Seen</a></small>
                                    </div>
                               </div>
                           @endforeach
                       @else
                           <p>You dont have notifications</p>
                       @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                     <div class="card-body">
                         <ul class="nav flex-column text-lg-left">
                             <li class="nav-item">
                               <a class="nav-link active" href="{{ route('delgont.account') }}"><i class="bx bx-cog"></i> Account Profile</a>
                             </li>
                             <li class="nav-item">
                                 <a href="" class="nav-link">Security</a>
                             </li>
                             <li class="nat-item"><a href="{{ route('delgont.account.activitylog') }}" class="nav-link">Activity Log</a></li>
                             <li class="nat-item"><a href="{{ route('delgont.account.notifications') }}" class="nav-link">Notifications</a></li>
                             <li class="nat-item"><a href="{{ route('delgont.account.password') }}" class="nav-link">Password Management</a></li>
                         </ul>
                     </div>
                </div>
             </div>


        </div>
    </div>
</section>
    
@endsection