<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Service Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('includes.style')
</head>

<body class="bg-light">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(0, 0, 0, 0.9);">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold text-uppercase" href="#">
                <img src="{{ asset('user/assets/img/ehgezly.jpg') }}" alt="Logo" width="40" height="40"
                    class="me-2 rounded-circle">
                <span style="color: #d3d3d3;">Ehgezly</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" style="color: #d3d3d3;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #d3d3d3;">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #d3d3d3;">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #d3d3d3;">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color: #d3d3d3;">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a></li>
                            <form id="logout-form" action="#" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="hero-content">
            <h1 class="display-4 fw-bold">Welcome to Ehgezly</h1>
            <p class="lead">Book your favorite services with ease!</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="card shadow mx-auto" style="max-width: 700px;">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">{{ $service->name }}</h3>
            </div>
            <div class="card-body">
                <img src="{{ $service->image }}" alt="Service Image" class="img-fluid rounded mb-3">
                <p><strong>Description:</strong> {{ $service->description }}</p>
                <p><strong>Price:</strong> ${{ $service->price }}</p>
                <p><strong>Availability:</strong>
                    <span class="badge bg-{{ $service->availability ? 'success' : 'danger' }}">
                        {{ $service->availability ? 'Available' : 'Not Available' }}
                    </span>
                </p>
                @session('success')
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endsession
                @if ($service->availability)
                    <form action="{{ route('user.reservations.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="name" value="{{ $service->name }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <div class="mb-3">
                            <label for="reservation_datetime" class="form-label">Reservation Date & Time</label>
                            <input type="datetime-local" name="reservation_date" id="reservation_date"
                                class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Book Now</button>
                    </form>
                @else
                    <div class="alert alert-warning text-center mt-4">
                        This service is currently unavailable.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-auto">
        © {{ date('Y') }} Service Reservation System. All rights reserved.
    </footer>

</body>

</html>
