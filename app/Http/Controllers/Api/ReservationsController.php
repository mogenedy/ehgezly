<?php

namespace App\Http\Controllers\Api;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{

    public function index()
    {
        $reservations = Reservation::all();
        return response()->json($reservations);

    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'reservation_date' => 'required|date',
            'status' => 'required|in:pending,approved,cancelled',
        ]);

        $reservation = Reservation::create($validated);

        return response()->json($reservation, 201);
    }



    public function show(string $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        return response()->json($reservation);
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'reservation_date' => 'required|date',
            'status' => 'required|in:pending,approved,cancelled',
        ]);

        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        $reservation->update($validated);

        return response()->json($reservation);
    }


    public function destroy(string $id)
    {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }
        $reservation->delete();
        return response()->json(['message' => 'Reservation deleted successfully']);
    }
}
