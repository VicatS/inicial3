@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show Role</div>

                    <div class="card-body">
                        @include('custom.message')

                        <form action="{{ route('role.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <h3>Required data</h3>

                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Name" name="name"
                                           value="{{ old('name', $role->name) }}"
                                           readonly
                                    >
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"
                                           placeholder="Slug" name="slug"
                                           value="{{ old('slug', $role->slug) }}"
                                           readonly
                                    >
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Description" name="description">{{ old('description', $role->name) }} </textarea>
                                </div>
                                <hr>
                                <h3>Full Access</h3>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="full_access_yes" name="full_access"
                                           class="custom-control-input" value="yes" disabled
                                           @if($role['full_access'] == "yes")
                                           checked
                                           @elseif(old('full_access') == "yes")
                                           checked
                                        @endif
                                    >
                                    <label class="custom-control-label" for="full_access_yes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="full_access_no" name="full_access"
                                           class="custom-control-input" value="no" disabled
                                           @if($role['full_access'] == "no")
                                           checked
                                           @elseif(old('full_access') == "no")
                                           checked
                                        @endif
                                    >
                                    <label class="custom-control-label" for="full_access_no">No</label>
                                </div>
                                <hr>

                                <h3>Permission List</h3>

                                @foreach($permissions as $key => $permission)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="permission_{{ $permission->id }}"
                                               name="permission[]" value="{{ $permission->id }}" disabled
                                               @if(is_array(old('permission')) && in_array("$permission->id", old('permission')))
                                               checked
                                               @elseif(is_array($permission_role) && in_array("$permission->id", $permission_role))
                                               checked
                                            @endif
                                        >
                                        <label class="custom-control-label" for="permission_{{ $permission->id }}">
                                            {{ $permission->id }}
                                            -
                                            {{ $permission->name }}
                                            <em>({{ $permission->description }})</em>
                                        </label>
                                    </div>
                                @endforeach()
                                <hr>
                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('role.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
