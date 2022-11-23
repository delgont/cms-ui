@extends('delgont::layout.master')

@section('title' , 'Users')

@section('pageHeading', 'Users')

@section('pageActions')

@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    @if (count($users))
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Since</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-danger delete-admin" href="{{ route('delgont.users.destroy' , ['id' => $user->id]) }}">delete</a>
                                                <a class="btn btn-sm btn-primary" href="{{ route('delgont.users.show', ['id' => $user->id, 'username' => $user->name]) }}">edit</a>
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
    </div>
</div>
@endsection