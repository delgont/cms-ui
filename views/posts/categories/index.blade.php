@extends('delgont::layout.master')

@section('title', 'Post Types')
@section('pageHeading', 'Post Categories')

@section('requiredJs')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
@endsection

@section('actions-right')
<a href="" data-toggle="tooltip" title="Synchronize Post Types"><i class="bx bx-sm bx-sync"></i></a>
@endsection



@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="card shadow-sm p-0 alert alert-light">
                    <div class="card-body text-dark">

                       @if (count($categories))
                       <div class="table-responsive">
                        <table class="table table-borderless table-hover">
                            <thead>
                                <th>
                                    <input type="checkbox" name="" id="">
                                </th>
                                <th>Category</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="" id="">
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            {{ $category->created_at }}
                                        </td>
                                        <td>
                                            <a href="" class=""><i class="bx bx-trash bx-sm text-danger font-weight-light"></i></a>
                                            <a href="" class=""><i class="bx bx-sm bx-edit text-success font-weight-light"></i></a>
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
    
            <div class="col-lg-4">
                
            </div>
        </div>
    </div>
</section>

@endsection