@extends('admin.dashboard')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container py-5">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0">➕ Create New Service</h4>
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

                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Service Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration (Hours)</label>
                            <input type="number" step="0.1" name="duration" class="form-control" value="{{ old('duration') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Service Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="availability" id="availability" >
                            <label class="form-check-label" for="availability">Available</label>
                        </div>

                        <button type="submit" class="btn btn-success">💾 Save Service</button>
                        <a href="{{ route('services.index') }}" class="btn btn-secondary">← Back to List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
