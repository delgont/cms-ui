@extends('delgont::layout.master')

@section('title', 'Dashboard | Templates')
@section('pageHeading', 'Templates')


@section('content')
<section class="mt-4 home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <div class="row">
                    @if (count($templates))
                        @foreach ($templates as $template)
                            <div class="col-lg-3 border-primary mb-3">
                                <div class="card shadow-sm bg-white">
                                    <a href="{{ route('delgont.templates.show', ['id' => $template->id]) }}">
                                        <img class="card-img-top" src="{{ ($template->preview != null) ? asset($template->preview) : asset('img/templates/default.jpg') }}" alt="Featured Image" id="" />
                                    </a>
                                    <div class="card-body text-center">
                                      <h6 class="card-title mb-0 text-capitalize">{{ $template->name }}</h6>
                                      <hr class="mb-1" />
                                      <small>{{ $template->sections_count }} Sections</small>
                                      <small>{{ $template->posts_count }} Posts</small>
                                      <hr class="mb-1" />
                                      <form action="">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="" id="" value="checkedValue" />
                                              Disable
                                            </label>
                                          </div>
                                      </form>
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
</section>
@endsection