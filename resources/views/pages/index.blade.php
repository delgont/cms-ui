@extends('delgont::layout.master')

@section('title', 'Pages')
@section('pageHeading', 'Pages')

@section('actions-right')
    <a href="{{ route('delgont.pages.create') }}" class=""><i class="bx bx-plus bx-sm"></i></a>
@endsection

@section('actions')
    <a href="" class="text-success p-1"><i class="bx bx-tag bx-sm"></i></a>
    <a href="" class="p-1"><i class="bx bx-trash bx-sm"></i><span class="badge badge-danger badge-counter">7</span></a>
@endsection

@section('content')

<section class="page-section mt-4">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-2">
                        @if (count($pages))
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>
                                            <input type="checkbox">
                                        </th>
                                        <th>Label(Key)</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Posts</th>
                                        <th>Created On</th>
                                        <th>Updated On</th>
                                        <th>Updated By</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($pages as $page)
                                            <tr data-toggle="tooltip" title="{{ $page->extract_text }}">
                                                <td>
                                                    <input type="checkbox">
                                                </td>
                                                <td>{{$page->page_key}}</td>
                                                <td>{{str_limit($page->page_title, 20)}}</td>
                                                <td>{{ ($page->author != null) ? $page->author->name : 'System' }}</td>
                                                <td>
                                                    @if (count($page->categories))
                                                        @foreach ($page->categories as $category)
                                                            <small>{{$category->name.','}}</small>
                                                        @endforeach
                                                    @else
                                                    <small>not linked to any</small>
                                                    @endif
                                                </td>
                                                <td>{{ ($page->posttype) ? $page->posttype->name : 'no posts' }}</td>
                                                <td>{{$page->created_at}}</td>
                                                <td>{{$page->updated_at}}</td>
                                                <td>{{ ($page->updatedBy != null) ? $page->updatedBy->name : 'System' }}</td>
                                                <td>
                                                    <a href="{{route('delgont.pages.edit', ['id' => $page->id])}}" class="text-primary"><i class='bx bx-edit bx-sm'></i></a>
                                                    <a href="{{ route('delgont.pages.destroy', ['id' => $page->id]) }}" class="text-danger"><i class="bx bx-trash bx-sm"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pages-pagination">
                                {{$pages->links()}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection
