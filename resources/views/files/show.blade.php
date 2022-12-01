@extends('delgont::layout.master')

@section('title', 'Dashboard | Home')
@section('pageHeading', 'file')


@section('content')
<section class="mt-4 home">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-1">
                <div class="card rounded-circle border border-light">
                    <div class="card-body p-0">
                        <img src="{{ asset(($file->icon) ? $file->icon->url : 'img/delgont.file.icon.jpg') }}" alt="" class="img-fluid rounded-circle" />
                    </div>
                </div>
                <div class="card alert alert-primary mt-3 p-0">
                    <div class="card-body p-1 px-2">
                        <small class="m-0 font-weight-bold">5 MB</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="card alert alert-light">
                            <div class="card-body p-0">
                                <h4 class="text-dark mb-2"><i class="bx bx-tag text-primary"></i> {{ $file->label }}</h4>
                                <div class="">
                                    <small class="text-primary">Description</small>
                                    <p class="text-dark mb-2">{{ $file->description }}</p>
                                    <small class="text-primary">Mime Type</small>
                                    <p class="text-dark">{{ $file->mime_type }}</p>
                                </div>
                                <a href=""><i class="bx bx-sm bx-trash"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-1">
                        <a href=""><i class="bx bx-sm bx-trash"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 file-preview">
                <div class="card mb-2">
                    <div class="card-header p-3">
                        <h6 class="mb-0 card-title font-weight-bold">File Preview</h6>
                    </div>
                </div>
                <div class="card alert alert-primary border border-info p-0">
                    <div class="card-body p-0">
                        <img src="{{ asset($file->url) }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection