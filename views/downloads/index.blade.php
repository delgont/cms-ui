@extends('delgont::layout.master')

@section('title', 'Dashboard | Home')
@section('pageHeading', 'Downloads')


@section('content')
<section class="mt-4 home">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        @if (count($downloads))
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <th><input type="checkbox"></th>
                                        <th></th>
                                        <th>Description</th>
                                        <th>Mime Type</th>
                                        <th>Uploaded On</th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($downloads as $download)
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>
                                                    @switch($download->mime_type)
                                                        @case('application/pdf')
                                                            <i class='bx bxs-file-pdf bx-sm'></i>
                                                            @break
                                                        @case('image/png')
                                                            <i class="bx bxs-file-png bx-sm"></i>
                                                            @break
                                                        @case('application/x-zip-compressed')
                                                            <i class="bx bx-file bx-sm"></i>
                                                            @break
                                                        @case('audio/mpeg')
                                                            <i class="bx bx-music bx-sm"></i>
                                                            @break
                                                        @default
                                                            <i class="bx bx-file bx-sm"></i>
                                                            
                                                    @endswitch
                                                </td>
                                                <td>{{ ($download->description) ? str_limit($download->description , 15): 'Not provided' }}</td>
                                                <td>{{ str_limit($download->mime_type, 20) }}</td>
                                                <td>{{ $download->created_at }}</td>
                                                <td><i class="bx bx-error bx-sm text-danger"></i></td>
                                                <td>
                                                    <a href="{{ route('delgont.downloads.download', ['id' => $download->id]) }}" class="d-inline"><i class="bx bx-download bx-sm"></i></a>
                                                    <a href="{{ route('delgont.downloads.destroy', ['id' => $download->id]) }}" class="d-inline"><i class="bx bx-trash bx-sm"></i></a>
                                                    <a href="{{ route('delgont.downloads.show', ['id' => $download->id]) }}" class="d-inline"><i class="bx bx-show bx-sm"></i></a>
                                                    <a href="{{ asset($download->url) }}" class="d-inline copy-link-url snackbar" id="copyLinkUrl" ><i class="bx bx-copy bx-sm"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4 ">
                <h6>Upload a Downloadable File</h6>
                <form action="{{ route('delgont.downloads.store') }}" method="POST" enctype="multipart/form-data" id="downloadUploadForm">
                    @csrf
                    <label for="download">Choose Downloadable File</label>
                    <input type="file" name="download" id="download" accept="application/*, image/*, audio/*" /><br />
                    <small class="text-danger">{{ $errors->first('download') }}</small><br />
                    <label for="icon">Attach Icon</label>
                    <input type="file" name="icon" accept="image/*" id="icon" />
                    <textarea name="description" id="" cols="30" rows="4" class="form-control mb-2" placeholder="Description"></textarea>
                    @if (count($categories))
                        <small><b>Categorize your download</b></small>
                        @foreach ($categories as $category)
                            <div class="form-check mb-1 {{ ($category->parent_id) ? 'ml-3' : '' }}">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="category[]" id="{{ 'category'.$category->id }}" value="{{ $category->id }}">
                                {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    @endif
                    <input type="submit" value="Upload" class="btn btn-sm btn-primary" />
                </form>
            </div>

        </div>
    </div>
    
</section>
@endsection