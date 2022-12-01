@extends('delgont::layout.master')

@section('title', 'Dashboard | Sections')
@section('pageHeading', 'Sections')


@section('content')
<section class="mt-4 home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <div class="card alert alert-light p-0">
                    <div class="card-body">
                        @if (count($sections) && count($sections) > 0)
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <th><input type="checkbox" name="" id=""></th>
                                        <th>Name</th>
                                        <th>Section Path</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $section)
                                            <tr>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td class="font-weight-bold">{{ $section->name }}</td>
                                                <td>{{ $section->path }}</td>
                                                <td>
                                                    <a href=""><i class="bx bx-sm bx-trash text-danger"></i></a>
                                                    <a href="{{ route('delgont.templates.sections.show', ['id' => $section->id]) }}"><i class="bx bx-sm bx-edit text-primary"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                {{ $sections->links() }}
                            </div>
                        @else
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection