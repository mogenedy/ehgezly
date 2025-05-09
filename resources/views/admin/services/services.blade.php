@extends('admin.dashboard')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container py-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('services.index') }}">All Services</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services List</li>
                    </ol>
                </nav>
                <div class="card shadow-lg rounded-4">
                    <div
                        class="card-header bg-primary text-white rounded-top-4 d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">🛠️ All Services</h4>
                        <a href="{{ route('services.create') }}" class="btn btn-success btn-sm">➕ Create New Service</a>
                    </div>

                    <div class="card-body p-4">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($services->isEmpty())
                            <p class="text-muted">No services found!</p>
                        @else
                            <div class="table-responsive">
                                <form action="{{ route('services.index') }}" method="GET" class="mb-4">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-8">
                                            <input type="text" name="search"
                                                class="form-control shadow-sm rounded-pill px-4"
                                                placeholder="🔍 Search for a service by name or description..."
                                                value="{{ request('search') }}">
                                        </div>
                                        <div class="col-md-4 text-md-start">
                                            <button class="btn btn-primary rounded-pill px-4 shadow-sm w-100"
                                                type="submit">
                                                🔎 Search
                                            </button>
                                        </div>
                                    </div>
                                </form>


                                <table class="table table-bordered table-striped align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Duration</th>
                                            <th>Availability</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $index => $service)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $service->name }}</td>
                                                <td>{{ Str::limit($service->description, 50) }}</td>
                                                <td>${{ number_format($service->price, 2) }}</td>
                                                <td>{{ $service->duration }} hrs</td>
                                                <td>
                                                    @if ($service->availability)
                                                        <span class="badge bg-success">Available</span>
                                                    @else
                                                        <span class="badge bg-danger">Unavailable</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('services.edit', $service) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </a>

                                                    <form action="{{ route('services.destroy', $service->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-light text-danger"
                                                            title="Delete">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $services->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
