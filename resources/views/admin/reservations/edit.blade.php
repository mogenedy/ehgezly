@extends('admin.dashboard')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container py-5">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h4 class="mb-0">✏️ Edit Reservation</h4>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Reservation Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $reservation->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="user_id" class="form-label">User</label>
                                <select name="user_id" id="user_id" class="form-select" required>
                                    <option value="">-- Select User --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $reservation->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="service_id" class="form-label">Service</label>
                                <select name="service_id" id="service_id" class="form-select" required>
                                    <option value="">-- Select Service --</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ $service->id == $reservation->service_id ? 'selected' : '' }}>{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="reservation_date" class="form-label">Reservation Date</label>
                                <input type="datetime-local" name="reservation_date" id="reservation_date" class="form-control" value="{{ old('reservation_date', $reservation->reservation_date) }}" required>
                            </div>

                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
