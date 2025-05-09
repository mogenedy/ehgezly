@extends('user.index')
@section('content')
    <div class="services-card border" style="border-width: 10px; border-color: #d64545;">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color">SERVICES</span>
                <h2>Our Services and All Other Details</h2>
            </div>
            <div class="row pt-45">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-sm-6 d-flex align-items-stretch">
                        <div class="services-card d-flex flex-column h-100">
                            <img src="{{ $service->image }}" class="card-img-top" alt="{{ $service->name }}">
                            <div class="card-body d-flex flex-column flex-grow-1">
                                <h3><a href="service-details.html">{{ $service->name }}</a></h3>
                                <p>{{ $service->description }}</p>
                                <p class="card-text fw-bold">{{ $service->price }} EGP</p>
                                <p class="card-text">
                                    @if ($service->availability)
                                        <span class="badge bg-success">Available</span>
                                    @else
                                        <span class="badge bg-danger">Not Available</span>
                                    @endif
                                </p>
                                @auth
                                    <a href="{{ route('user.reservations.show', ['service' => $service->id]) }}"
                                        class="btn btn-primary w-100 mt-auto {{ $service->availability ? '' : 'disabled' }}"
                                        {{ $service->availability ? '' : 'aria-disabled=true tabindex=-1' }}>
                                        Book Now
                                    </a>
                                @endauth

                                @guest
                                    <a href="{{ route('user.register') }}"
                                        class="btn btn-primary w-100 mt-auto {{ $service->availability ? '' : 'disabled' }}"
                                        {{ $service->availability ? '' : 'aria-disabled=true tabindex=-1' }}>
                                        Book Now
                                    </a>
                                @endguest

                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center mt-4">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
