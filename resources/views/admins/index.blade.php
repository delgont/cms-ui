@extends('delgont::layout.master')

@section('title')
    Dashboard | Admins
@endsection


@section('pageHeading', 'Administrators')

@section('actions')
    <div class="dropdown show d-inline">
        <a class="dropdown-toggle" href="#" role="button" id="authorDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-group bx-sm"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="authorDropdown">
        <a class="dropdown-item" href="#"><small>Created By</small><span class="d-block">{</span></a>
        <a class="dropdown-item" href="#"><small>Last Update By</small><span class="d-block">/span></a>
        </div>
    </div>
    <a href="{{ route('delgont.admins.create') }}" class="" data-toggle="tooltip" title="Add New Admin"><i class="bx bx-plus bx-sm"></i> <span class="py-3"></span></a>
    <a href="" class="" data-toggle="tooltip" title="Comments"><i class="bx bx-comment bx-sm"></i><span class="badge badge-danger badge-counter"></span></a>

@endsection

@section('content')
    <section class="mt-4">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-8">
                    <div class="card alert alert-light">
                        <div class="card-body">
                            @if (count($admins))
                                @foreach ($admins as $admin)
                                    <div class="row py-2">
                                        <div class="col-lg-1 p-0"><input type="checkbox" name="" id=""></div>
                                        <div class="col-lg-1 p-0">
                                            @if ($admin)
                                                <img src="{{ ($admin->user->avator) ? asset($admin->user->avator->url) : asset('img/avator.jpg') }}" alt="" class="navbar-img rounded-circle w-25" >
                                            @endif
                                        </div>
                                        <div class="col-lg-7">
                                            <small class="text-dark font-weight-bold">{{ $admin->user->name }}</small>
                                            <a class="" href="{{ '#my-collapse'.$admin->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="{{ 'my-collapse'.$admin->id }}">
                                                <h6 class="mb-0 text-capitalize text-dark font-weight-bold " >{{ $admin->first_name.' '.$admin->last_name }}</h6>
                                            </a>
                                        </div>
                                        <div class="col-lg-3">
                                            <a href=""><i class="bx bx-trash text-danger bx-sm"></i></a>
                                            <a href=""><i class="bx bx-edit bx-sm"></i></a>
                                        </div>
                                        
                                        <div class="col-lg-12 collapse" id="{{ 'my-collapse'.$admin->id }}">
                                            <div class="alert alert-success border-light" role="alert">
                                                Content
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    


@endsection