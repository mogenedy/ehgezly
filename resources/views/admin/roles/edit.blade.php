@extends('admin.dashboard')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container py-5">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header bg-warning text-white rounded-top-4">
                        <h4>Edit Role</h4>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> --}}
                            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">All Roles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                        </ol>
                    </nav>
                    <div class="card-body">
                        <form action="{{ route('roles.update', $role) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="role" class="form-label">Role Name</label>
                                <input type="text" name="role" id="role" class="form-control"
                                    value="{{ $role->role }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Permissions</label>
                                <div class="row">
                                    @foreach (config('permissions') as $key => $value)
                                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                                            <div class="form-check border p-2 rounded">
                                                <input type="checkbox" name="permissions[]" value="{{ $key }}"
                                                    class="form-check-input" id="perm_{{ $key }}"
                                                    {{ in_array($key, $role->permissions ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="perm_{{ $key }}">{{ $value }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-success btn-sm w-auto">Update Role</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
