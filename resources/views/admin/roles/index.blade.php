@extends('admin.dashboard')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">
            <div class="container py-5">
                <div class="card shadow-lg rounded-4">
                    <div
                        class="card-header bg-primary text-white rounded-top-4 d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">📋 All Roles</h4>
                        <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm">➕ Create New Role</a>
                    </div>

                    <div class="card-body p-4">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($roles->isEmpty())
                            <p class="text-muted">No roles found!</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Role Name</th>
                                            <th>Permissions</th>
                                            {{-- <th>Created At</th> --}}
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $index => $role)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $role->role }}</td>
                                                <td>
                                                    @foreach ($role->permissions as $perm)
                                                        <span
                                                            class="badge bg-info text-dark">{{ config('permissions')[$perm] ?? $perm }}</span>
                                                    @endforeach
                                                </td>
                                                {{-- <td>{{ $role->created_at->format('Y-m-d') }}</td> --}}
                                                <td>
                                                    <a href="{{ route('roles.edit', $role) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </a>



                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                        class="d-inline" onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-light text-danger"
                                                            title="Delete">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                        @if (session('error'))
                                                            <div class="alert alert-danger">
                                                                {{ session('error') }}
                                                            </div>
                                                        @endif

                                                    </form>
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
@endsection
