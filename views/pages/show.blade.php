@extends('delgont::layout.master')

@section('title', 'Pages')
@section('pageHeading', 'Page')

@section('content')

<section class="page-section mt-4">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <small>Page Title</small>
                        <h1 class="mb-4">
                            {{ $page->page_title }}
                        </h1>
                        <small>Page Content</small>
                        <div>
                            {!! $page->page_content !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <img src="{{ asset($page->page_featured_image) }}" class="img-fluid" alt="" />
            </div>

        </div>
    </div>
</section>
@endsection