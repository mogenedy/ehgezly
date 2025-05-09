@extends('user.index')
@section('content')

    <div class="container py-5">
        @include('includes.validation-errors')
        <h2 class="mb-4">Upcoming Reservations</h2>


        @if ($upcoming->count())
            <div class="list-group mb-5">
                @foreach ($upcoming as $res)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5>{{ $res->name }}</h5>
                            <small class="text-muted">{{ $res->reservation_date }}</small>
                        </div>
                        <form action="{{ route('user.reservations.cancel', $res->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to cancel this reservation?');">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                        </form>

                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">No upcoming reservations.</p>
        @endif

        <h2 class="mb-4">Past Reservations</h2>
        @if ($past->count())
            <ul class="list-group">
                @foreach ($past as $res)
                    <li class="list-group-item">
                        <strong>{{ $res->name }}</strong> <br>
                        <small class="text-muted">{{ $res->reservation_date }}</small>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">No past reservations.</p>
        @endif
    </div>
@endsection
