@extends('delgont::layout.master')

@section('title', 'Settings - General')
@section('pageHeading', 'General Settings')


@section('requiredJs')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endsection

@section('actions-right')
@endsection


@section('actions')
    <a href="" class="btn-outline-primary text-primary btn btn-sm p-1"><i class="bx bx-menu"></i> Pages</a>
    <a href="" class="btn-outline-danger text-danger btn btn-sm p-1"><i class="bx bx-trash"></i><span class="badge badge-danger badge-counter">7</span></a>
@endsection


@section('content')
<section class="mt-3">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-2">
                <div class="card">
                    <div class="card-body pt-3 p-1 pb-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                              <a class="nav-link active" href="{{ route('delgont.settings.general') }}"><i class="bx bx-cog"></i> General Settings</a>
                              <a class="nav-link" href="{{ route('delgont.settings.general') }}"><i class="bx bx-grid"></i> Caching</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <form action="{{ route('delgont.settings.general') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
    
                            <div class="row">

                                <div class="col-lg-12 pages-settings mb-4">
                                    <div>
                                        <h5>Pages</h5>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Page Key Mode</h6>
                                        <p class="mb-2">Page Key Mode</p>
                                    </div>
                                    <div class="form-check d-inline">
                                        <input type="radio" class="form-check-input" name="page_key_mode" value="strict" id="strictModePageKeys" {{ (option('page_key_mode') == 'strict') ? 'checked' : '' }} />
                                        <label class="form-check-label" for="strictModePageKeys">Strict Mode</label>
                                    </div>
                                    <div class="form-check d-inline ml-lg-3">
                                        <input type="radio" class="form-check-input " name="page_key_mode" value="custom" id="customModePageKeys" {{ (option('page_key_mode') == 'custom') ? 'checked' : '' }} />
                                        <label class="form-check-label" for="customModePageKeys">Custom Mode</label>
                                    </div>
                                    <div class="form-check d-inline ml-lg-3">
                                        <input type="radio" class="form-check-input " name="page_key_mode" value="both" id="bothModePageKeys" {{ (option('page_key_mode') == 'both') ? 'checked' : '' }} />
                                        <label class="form-check-label" for="bothModePageKeys">Both</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 pages-settings mb-4">
                                    <div>
                                        <h6 class="mb-1">Associate Pages With Posts</h6>
                                        <p class="mb-2"></p>
                                    </div>
                                    <div class="form-check d-inline">
                                        <input type="radio" class="form-check-input" name="associate_page_with_posts" value="1" id="associatePagesWithPosts" {{ (option('associate_page_with_posts')) ? 'checked' : '' }} />
                                        <label class="form-check-label" for="associatePagesWithPosts">On</label>
                                    </div>
                                    <div class="form-check d-inline ml-lg-3">
                                        <input type="radio" class="form-check-input " name="associate_page_with_posts" value="0" id="dontAssociatePagesWithPosts" {{ (!option('associate_page_with_posts')) ? 'checked' : '' }} />
                                        <label class="form-check-label" for="dontAssociatePagesWithPosts">Off</label>
                                    </div>
                                </div>
    
                                <div class="col-lg-12">
                                    <hr />
                                    <h6 class="mb-1">Performance Optimazation</h6>
                                    <p class="mb-2">Caching settings will help improve on the system performance</p>
                                </div>
    
                                <div class="col-lg-12 cache-options">
                                    <div class="form-check d-inline">
                                        <input name="cache_options" class="form-check-input" type="radio" value="1" id="allowOptionCache" {{ (option('cache_options')) ? 'checked' : '' }} />
                                        <label class="form-check-label" for="allowOptionCache">Allow Settings Cache</label>
                                    </div>
                                    <div class="form-check d-inline ml-lg-3">
                                        <input name="cache_options" class="form-check-input" type="radio" value="0" id="dontAllowOptionCache" {{ (!option('cache_options')) ? 'checked' : '' }} />
                                        <label class="form-check-label" for="dontAllowOptionCache">Don't Allow</label>
                                    </div>
                                </div>
    
                                <div class="col-lg-12 mt-4">
                                    <hr />
                                    <input type="submit" class="btn btn-ms btn-primary" value="save" />
                                </div>
    
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>

        </div>
    </div>
</section>
@endsection