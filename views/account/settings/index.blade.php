@extends('ldashboard::core.layouts.master')

@section('title')
    Schlr Dashboard - Profile
@endsection

@section('pageHeading')
    <div class="row">
        <div class="col-lg-3">
            <img src="{{ asset('lad/img/avator.jpg') }}" alt="avator" class="img-fluid rounded-circle" style="width: 100%;" />
        </div>
        <div class="col-lg-9">
            <small><b>{{ auth()->user()->userable->last_name.' '.auth()->user()->userable->first_name }}</b></small>
            <h2 class="mt-1 mb-1">{{ auth()->user()->name }}</h2>

        </div>
    </div>
@endsection

@section('content')
    <section>
        <div class="container-fluid">
           <div class="row">

                <div class="col-lg-3">
                    <div class="list-group custom-list-group pr-5">
                        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> Profile</a>
                        <a href="{{route('lad.account.activitylog')}}" class="list-group-item list-group-item-action"><i class="fa fa-pencil"></i> Appearance</a>
                        <a href="{{route('lad.account.activitylog')}}" class="list-group-item list-group-item-action"><i class="fa fa-bell"></i> Notifications</a>
                        <a href="{{route('lad.account.activitylog')}}" class="list-group-item list-group-item-action"><i class="fa fa-shield"></i> Authentication</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    @switch(last(request()->segments()))
                        @case('settings')
                            <div>
                                hello
                            </div>
                            @break
                        @case(2)
                            
                            @break
                        @default
                            
                    @endswitch
                </div>


           </div>
        </div>
    </section>
    
@endsection