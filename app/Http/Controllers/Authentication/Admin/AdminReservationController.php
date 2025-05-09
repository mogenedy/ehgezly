<?php

namespace App\Http\Controllers\Authentication\Admin;

use App\Models\User;
use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\StoreReservationRequest;

class AdminReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::paginate(6);
        return view('admin.reservations.reservations', compact('reservations'));
    }

    public function statistics()
    {
        $totalReservations = Reservation::count();
        $availableReservations = Reservation::where('status', 'approved')->count();
        $unavailableReservations = Reservation::where('status', 'cancelled')->count();
        $totalUsers = User::count();
        return view('admin.reservations.statistics', [
            'totalReservations' => $totalReservations,
            'availableReservations' => $availableReservations,
            'unavailableReservations' => $unavailableReservations,
            'totalUsers' => $totalUsers,
        ]);
    }

    public function create()
    {
        $services = Service::where('availability', true)->get();
        $users = User::all();
        return view('admin.reservations.create', compact('services', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $validated = $request->validated();
        $reservation = new Reservation();
        $reservation->name = $validated['name'];
        $reservation->user_id = $validated['user_id'];
        $reservation->service_id = $validated['service_id'];
        $reservation->reservation_date = $validated['reservation_date'];
        $reservation->status = 'pending';
        $reservation->save();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation created successfully!');
    }



    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $services = Service::all();
        $users = User::all();

        return view('admin.reservations.edit', compact('reservation', 'services', 'users'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'reservation_date' => 'required|date|after:today',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->name = $request->name;
        $reservation->user_id = $request->user_id;
        $reservation->service_id = $request->service_id;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->save();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation updated successfully!');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation deleted successfully!');
    }

}
