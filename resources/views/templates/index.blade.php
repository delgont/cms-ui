@extends('delgont::layout.master')

@section('title', 'Dashboard | Templates')
@section('pageHeading', 'Templates')


@section('content')
<section class="mt-4 home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <div class="card alert alert-light p-0">
                    <div class="card-body">
                        @if (count($templates) && count($templates) > 0)
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover">
                                    <thead>
                                        <th><input type="checkbox" name="" id=""></th>
                                        <th>Name</th>
                                        <th>Template Path</th>
                                        <th>Posts</th>
                                        <th>Sections</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($templates as $template)
                                            <tr>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td class="font-weight-bold">{{ $template->name }}</td>
                                                <td>{{ $template->path }}</td>
                                                <td>{{ $template->posts_count }}</td>
                                                <td>{{ $template->sections_count }}</td>
                                                <td>
                                                    <a href=""><i class="bx bx-sm bx-trash text-danger"></i></a>
                                                    <a href=""><i class="bx bx-sm bx-edit text-primary"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                {{ $templates->links() }}
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