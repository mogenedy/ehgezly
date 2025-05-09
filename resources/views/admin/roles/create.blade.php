@extends('admin.dashboard')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container py-5">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h4 class="mb-0">➕ Create New Role</h4>
                    </div>
                    <div class="card-body p-4">
                        <nav aria-label="breadcrumb" class="mb-4">
                            <ol class="breadcrumb bg-light p-3 rounded">
                                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                        @include('includes.validation-errors')

                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="role" class="form-label fw-bold">Role Name</label>
                                <input type="text" name="role" id="role" class="form-control form-control-lg"
                                    placeholder="e.g., Admin, Manager...">
                            </div>

                            
                            <div class="mb-4">
                                <label class="form-label fw-bold">Assign Permissions</label>
                                <div class="row">
                                    @foreach (config('permissions') as $key => $value)
                                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                                            <div class="form-check border p-2 rounded">
                                                <input type="checkbox" name="permissions[]" value="{{ $key }}"
                                                    class="form-check-input" id="perm_{{ $key }}">
                                                <label class="form-check-label"
                                                    for="perm_{{ $key }}">{{ $value }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <div>
                                <button type="submit" class="btn btn-success btn-sm w-auto">Create Role</button>
                            </div>
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
