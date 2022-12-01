@extends('delgont::layout.master')

@section('title', 'Menus')

@section('pageHeading', 'Meus')


@section('actions-right')
@endsection


@section('content')
<section class="mt-4">
    <div class="container-fluid">
        <div class="row">
            
        </div>
        <div class="row">

            <!-- filter search posts select posts -->
            <!-- Posts Table -->
            <div class="col-lg-12">
                <div class="card shadow-sm alert alert-light p-0">
                    <div class="card-body">
                        @if (count($menus))
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <th><input type="checkbox" name="" id=""></th>
                                        <th>Menu</th>
                                        <th>Created On</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($menus as $menu)
                                            <tr>
                                                <td><input type="checkbox" name="" id=""></td>
                                                <td class="text-capitalize">{{ $menu->name }}</td>
                                                <td>{{ $menu->created_at }}</td>
                                                <td>
                                                    <a href=""><i class="bx bx-trash bx-sm"></i></a>
                                                    <a href="{{ route('delgont.menus.menu.show', ['id' => $menu->id]) }}"><i class="bx bx-edit bx-sm"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection