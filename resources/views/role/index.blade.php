@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>List of Roles</h2></div>

                    <div class="card-body">
                        <a class="btn btn-primary float-right mb-2" href="{{ route('role.create') }}">Create</a>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Description</th>
                                <th scope="col">Full Access</th>
                                <th colspan="3"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $key => $role)
                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ $role->full_access }}</td>
                                    <td><a class="btn btn-info" href="{{ route('role.show', $role->id) }}">Show</a></td>
                                    <td><a class="btn btn-success" href="{{ route('role.edit', $role->id) }}">Edit</a>
                                    </td>
                                    <td><a class="btn btn-danger"
                                           href="{{ route('role.destroy', $role->id) }}">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $roles->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
