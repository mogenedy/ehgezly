@extends('admin.dashboard')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container py-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.reservations.index') }}">All Reservations</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services List</li>
                    </ol>
                </nav>
                <div class="card shadow-lg rounded-4">
                    <div
                        class="card-header bg-primary text-white rounded-top-4 d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">📅 All Reservations</h4>
                    </div>

                    <div class="card-body p-4">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($reservations->isEmpty())
                            <p class="text-muted">No reservations found!</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Reservation Name</th>
                                            <th>User</th>
                                            <th>Service</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th> <!-- New column for actions -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservations as $index => $reservation)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $reservation->name }}</td>
                                                <td>{{ $reservation->user->name ?? 'N/A' }}</td>
                                                <td>{{ $reservation->service->name ?? 'N/A' }}</td>
                                                <td>{{ $reservation->reservation_date }}</td>
                                                <td>
                                                    @php
                                                        $badgeClass = match($reservation->status) {
                                                            'pending' => 'bg-warning',
                                                            'approved' => 'bg-success',
                                                            'cancelled' => 'bg-danger',
                                                            default => 'bg-secondary'
                                                        };
                                                    @endphp
                                                    <span class="badge {{ $badgeClass }}">
                                                        {{ ucfirst($reservation->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="bi bi-pencil-fill"></i> Edit
                                                    </a>

                                                    <!-- Delete Form -->
                                                    <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-light text-danger">
                                                            <i class="bi bi-trash-fill"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $reservations->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
