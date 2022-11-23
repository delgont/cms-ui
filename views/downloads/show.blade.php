@extends('delgont::layout.master')

@section('title', 'Dashboard | Home')
@section('pageHeading', 'Download')


@section('content')
<section class="mt-4 home">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body p-0">
                                @switch($download->mime_type)
                                    @case('application/pdf')
                                        <i class='bx bxs-file-pdf bx-lg'></i>
                                        @break
                                    @case('image/png')
                                        <img src="{{ asset($download->url) }}" alt="" class="img-fluid">
                                        @break
                                    @case('image/jpeg')
                                        <img src="{{ asset($download->url) }}" alt="" class="img-fluid">
                                        @break
                                    @case('application/x-zip-compressed')
                                        <i class="bx bx-file bx-lg"></i>
                                        @break
                                    @case('audio/mpeg')
                                        <i class="bx bx-music bx-lg"></i>
                                        @break
                                    @default
                                        <i class="bx bx-file bx-lg"></i>
                                @endswitch
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h5>{{ $download->description }}</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection