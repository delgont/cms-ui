@extends('delgont::layout.master')

@section('title', 'Dashboard | Template | '.$template->name)
@section('pageHeading', 'Template | '.$template->name)


@section('content')
<section class="mt-4 home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4"><img src="{{ ($template->preview != null) ? asset($template->preview) : asset('img/templates/default.jpg') }}" alt="" class="img-fluid" /></div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card border-primary">
                  <img class="card-img-top" src="holder.js/100px180/" alt="">
                  <div class="card-header">
                    <h4 class="card-title mb-0">Posts | Pages</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="list-group" >
                        @if (count($template->posts))
                            @foreach ($template->posts as $post)
                                <div class="list-group-item list-group-item-action">
                                    <span class="">{{ $post->post_title }}</span> 
                                    <a href="" class="float-right"><i class="bx bx-trash bx-sm"></i></a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="btn-group">
                    <a class="dropdown-toggle rounded-circle bg-primary text-white p-2" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="bx bx-plus bx-sm"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item disabled" href="#">Disabled action</a>
                        <h6 class="dropdown-header">Section header</h6>
                        <a class="dropdown-item" href="#">Action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">After divider action</a>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                  Launch
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    Add rows here
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection