@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>List of Users</h2></div>
                    @include('custom.message')
                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role(s)</th>
                                <th colspan="3"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @isset($user->roles[0]->name)
                                            {{$user->roles[0]->name}}
                                        @endisset
                                    </td>
                                    <td><a class="btn btn-info" href="{{ route('user.show', $user->id) }}">Show</a></td>
                                    <td><a class="btn btn-success" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
