@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User</div>

                    <div class="card-body">
                        @include('custom.message')

                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <h3>Required data</h3>

                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Name" name="name"
                                           value="{{ old('name', $user->name) }}"
                                    >
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Email" name="email"
                                           value="{{ old('email', $user->email) }}"
                                    >
                                </div>

                                <div class="form-group">
                                    <select name="roles" id="roles"
                                            class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}"
                                                    @isset($user->roles[0]->name)
                                                    @if($role->name == $user->roles[0]->name)
                                                    selected
                                                @endif
                                                @endisset
                                            >
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <hr>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('user.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
