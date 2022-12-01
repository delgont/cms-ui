@extends('delgont::layout.master')

@section('title', 'Dashboard | Home')
@section('pageHeading', 'Dashboard2')


@section('search')
    @include('delgont::includes.forms.search', ['action' => route('delgont.posts.search')])
@endsection


@section('content')
<section class="mt-4 home">
    <div class="container-fluid">
        <div class="row" id="app">gg</div>
        <div class="row">

            <div class="col-lg-8">
                <div class="row">

                    <div class="col-md-3 col-lg-4">
                        <div class="card p-0 alert alert-light shadow-sm border-info">
                            <div class="card-body py-2 px-3">
                                <h4 class="mb-2 text-dark d-inline-block font-weight-bold display-6">Posts</h4>
                                <i class="icon bx bx-notepad bx-sm text-primary d-inline-block float-right"></i>
                                <h3 class="count text-primary mb-0">{{ $posts_count }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card p-0 alert alert-light border-primary shadow-sm">
                            <div class="card-body py-2 px-3">
                                <h4 class="mb-2 text-dark d-inline-block font-weight-bold display-6">Pages</h4>
                                <i class="icon bx bx-layout bx-sm text-primary d-inline-block float-right"></i>
                                <h3 class="count text-primary mb-0">{{ $pages_count }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card p-0 alert alert-light shadow-sm border-secondary">
                            <div class="card-body py-2 px-3">
                                <h4 class="mb-2 text-dark d-inline-block font-weight-bold display-6">Downloads</h4>
                                <i class="icon bx bx-download bx-sm text-primary d-inline-block float-right"></i>
                                <h3 class="count text-primary mb-0">{{ $pages_count }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection