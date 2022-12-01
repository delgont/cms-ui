@extends('delgont::layout.master')

@section('title', 'Dashboard | Home')
@section('pageHeading', 'Files | Media')

@section('actions-right')
    <!-- Groups Dropdown -->
    <div class="dropdown show d-inline">
        <a href="#" class="dropdown-toggle" href="#" role="button" id="downloadablesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-tag bx-sm text-dark"></i>
        </a>
        <div class="dropdown-menu dropdown-list shadow-smcustom-scrollbar scrollable p-0" aria-labelledby="authorDropdown">
            <h6 class="dropdown-header bg-light text-primary font-weight-bold border-bottom border-light">
                File Categories
            </h6>
            @if (count($categories))
                @foreach ($categories as $category)
                <a class="dropdown-item d-flex align-items-center m-0 py-2" href="{{ route('delgont.files.of.category', ['category' => $category->id]) }}">
                    <div class="mr-2">
                      <div class="rounded-circle">
                        <img src="{{ asset('img/default-avator.jpg') }}" alt="" class="navbar-img rounded-circle" style="width: 22px;">
                      </div>
                    </div>
                    <div>
                        <small class="text-dark font-weight-bold text-capitalize">{{ $category->name }}</small>
                    </div>
                </a>
                @endforeach
            @else
                
            @endif
            <a class="dropdown-item text-center small text-gray-500 m-0" href="">Create Group</a>
        </div>
    </div>
    <!-- Groups Dropdown -->
    <div class="dropdown show d-inline">
        <a href="#" class="dropdown-toggle" href="#" role="button" id="downloadablesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-group bx-sm text-dark"></i>
        </a>
        <div class="dropdown-menu dropdown-list shadow-smcustom-scrollbar scrollable p-0" aria-labelledby="authorDropdown">
            <h6 class="dropdown-header bg-light text-primary font-weight-bold border-bottom border-light">
                File Groups
            </h6>
            @if (count($groups))
                @foreach ($groups as $group)
                <a class="dropdown-item d-flex align-items-center m-0 py-2" href="{{ route('delgont.files.of.group', ['group' => $group->id]) }}">
                    <div class="mr-2">
                      <div class="rounded-circle">
                        <img src="{{ asset('img/default-avator.jpg') }}" alt="" class="navbar-img rounded-circle" style="width: 22px;">
                      </div>
                    </div>
                    <div>
                        <small class="text-dark font-weight-bold text-capitalize">{{ $group->name }}</small>
                    </div>
                </a>
                @endforeach
            @else
                
            @endif
            <a class="dropdown-item text-center small text-gray-500 m-0" href="">Create Group</a>
        </div>
    </div>
    <a href="{{ route('delgont.files') }}" class="" data-toggle="tooltip" title="Unpublish Post">
        <i class="bx bx-home bx-sm text-dark"></i>
    </a>
@endsection

@section('content')
<section class="mt-4 home">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-8">
                <div class="card alert alert-light p-0 border border-info">
                    <div class="card-body">
                        @if (count($files))
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <th><input type="checkbox"></th>
                                        <th>****</th>
                                        <th>Label</th>
                                        <th>Mime Type</th>
                                        <th>Uploaded On</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($files as $file)
                                            <tr>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td class="" style="width: 50px;">
                                                    <img src="{{ asset(($file->icon) ? $file->icon->url : 'img/delgont.file.icon.jpg') }}" alt="" class="img-fluid rounded-circle border border-primary">
                                                </td>
                                                <td>{{ ($file->description) ? str_limit($file->description , 15): 'Not provided' }}</td>
                                                <td>{{ str_limit($file->mime_type, 20) }}</td>
                                                <td>{{ $file->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('delgont.files.show', ['id' => $file->id]) }}" class="d-inline"><i class="bx bx-download bx-sm"></i></a>
                                                    <a href="{{ route('delgont.files.destroy', ['id' => $file->id]) }}" class="d-inline"><i class="bx bx-trash bx-sm"></i></a>
                                                    <a href="{{ route('delgont.files.show', ['id' => $file->id]) }}" data-toggle="tooltip" title="File Details" class="d-inline"><i class="bx bx-show bx-sm"></i></a>
                                                    <a href="{{ asset($file->url) }}" class="d-inline copy-link-url snackbar" data-toggle="tooltip" title="Copy File Url" id="copyLinkUrl" ><i class="bx bx-copy bx-sm"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            
                        @endif
                        <div>
                            {{ $files->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card alert p-o alert-light border border-dark">
                    <div class="card-body">
                        Drag FIles here to upload
                    </div>
                </div>
                <div class="card alert alert-primary p-0 border border-success">
                    <div class="card-header">
                        <h6 class="mb-0 card-title text-dark">Upload a File</h6>
                    </div>
                    <div class="card-body py-2">
                        
                        <form action="{{ route('delgont.files.store') }}" method="POST" enctype="multipart/form-data" id="fileUploadForm">
                            @csrf
                            <label for="download">Choose File</label>
                            <input type="file" name="file" id="file" accept="application/*, image/*, audio/*" /><br />
                            <small class="text-danger">{{ $errors->first('file') }}</small><br />
                            <label for="icon">Attach Icon</label>
                            <input type="file" name="icon" accept="image/*" id="icon" />
                            <textarea name="description" id="" cols="30" rows="4" class="form-control mb-2" placeholder="Description"></textarea>
                            
                            <input type="submit" value="Upload" class="btn btn-sm btn-primary" />
                        </form>
                    </div>
                </div>
                
            </div>

            <div class="col-lg-1">

            </div>

        </div>
    </div>
    
</section>
@endsection