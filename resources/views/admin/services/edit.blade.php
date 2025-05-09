@extends('admin.dashboard')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container py-5">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header bg-warning text-dark rounded-top-4 d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">✏️ Edit Service</h4>
                        <a href="{{ route('services.index') }}" class="btn btn-secondary btn-sm">← Back to Services</a>
                    </div>

                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Service Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $service->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $service->description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $service->price) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="duration" class="form-label">Duration (minutes)</label>
                                <input type="number" step="0.01" name="duration" id="duration" class="form-control" value="{{ old('duration', $service->duration) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Service Image</label><br>
                                @if ($service->image)
                                    <img src="{{ asset($service->image) }}" alt="Current Image" width="100" class="mb-2">
                                @endif
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="availability" id="availability" {{ $service->availability ? 'checked' : '' }}>
                                <label class="form-check-label" for="availability">
                                    Available
                                </label>
                            </div>

                            <button type="submit" class="btn btn-warning">💾 Update Service</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
