<?php

namespace App\Http\Controllers\User\Reservations;

use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{


    public function show($service_id)
    {
        $service = Service::findOrFail($service_id);
        return view('user.reservations.show', compact('service'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => ['required', 'exists:services,id'],
            'reservation_date' => ['required', 'date', 'date'], //'after_or_equal:today'
        ]);

        $service = Service::findOrFail($request->service_id);

        Reservation::create([
            'name' => $service->name,
            'user_id' => auth()->id(),
            'service_id' => $service->id,
            'reservation_date' => $request->reservation_date,
        ]);

        return redirect()->route('user.reservations.manage')->with('success', 'Reservation created successfully');
    }


    public function manage()
    {
        $userId = auth()->id();
        $now = now();

        $upcoming = Reservation::where('user_id', $userId)
            ->where('reservation_date', '>', $now)
            ->orderBy('reservation_date')
            ->get();

        $past = Reservation::where('user_id', $userId)
            ->where('reservation_date', '<=', $now)
            ->orderByDesc('reservation_date')
            ->get();

        return view('user.reservations.manage', compact('upcoming', 'past'));
    }

    public function cancel($id)
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', auth()->id())
            ->where('reservation_date', '>', now())
            ->firstOrFail();

        $reservation->delete();

        return redirect()->route('user.reservations.manage')->with('success', 'Reservation cancelled successfully.');
    }

}
