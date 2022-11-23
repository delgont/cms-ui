@extends('delgont::layout.master')

@section('title', 'Activity Log - '.auth()->user()->name)


@section('pageHeading')
    Your Activity
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
                        <div class="row mb-3">
                            @if (count($activitylog))
                                @foreach ($activitylog as $log)
                                    <div class="col-lg-10">
                                        <a href="">{{ $log->action }}</a>
                                        @if ($log->content_type == 'html')
                                            {!! $log->activity_log !!}
                                        @else
                                            <p>{{ $log->activity_log }}</p>
                                        @endif
                                        
                                    </div>
                                    <div class="col-lg-2 pt-4">
                                        <a href="{{ route('delgont.account.activitylog.destroy', ['id' => $log->id]) }}" class="btn btn-sm btn-danger float-right"><i class="bx bx-trash"></i></a>
                                    </div>
                                    <div><hr /></div>
                                @endforeach
                            @else
                                <div class="col-lg-12">
                                    <div class="alert alert-primary">
                                        <p class="m-0">No recent activity ...!</p>
                                    </div>
                                    
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                     <div class="card-body">
                         <ul class="nav flex-column text-lg-left">
                             <li class="nav-item">
                               <a class="nav-link " href="{{ route('delgont.account') }}"><i class="bx bx-cog"></i> Account Profile</a>
                             </li>
                             <li class="nav-item">
                                 <a href="" class="nav-link">Security</a>
                             </li>
                             <li class="nat-item"><a href="{{ route('delgont.account.activitylog') }}" class="nav-link active">Activity Log</a></li>
                             <li class="nat-item"><a href="" class="nav-link">Notifications</a></li>
                             <li class="nat-item"><a href="" class="nav-link">Password Management</a></li>
                         </ul>
                     </div>
                </div>
             </div>


        </div>
    </div>
</section>
    
@endsection