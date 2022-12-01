@extends('delgont::layout.master')

@section('title', 'User')



@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-1">
                            <img src="{{ ($user->avator) ? asset($user->avator->url) : asset('img/default-avator.jpg') }}" alt="user avator" class="img-fluid rounded-circle" />
                        </div>
                        <div class="col-lg-8">
                            <h4 class="mb-1 text-capitalize">{{ $user->name }}</h4>
                            <p class="mb-1">{{ $user->email }}</p>
                            <h6 class="mb-1">Roles</h6>
                            @if (count($user->roles))
                                
                            @else
                                <small>{{ __('No roles assigned to this user') }}</small>
                            @endif
                        </div>
                        <div class="col-lg-3 pt-lg-3">
                            <a href="g" class="btn btn-sm btn-danger">Disable Account</a>
                        </div>
                        <div class="col-lg-8"><hr></div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection