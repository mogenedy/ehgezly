<?php

namespace App\Http\Controllers\Authentication\Admin;

use App\Http\Requests\AdminRequest\AdminServiceUpdateRequest;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\AdminServiceRequest;

class AdminServiceController extends Controller
{
    public function index(Request $request)
{
    $query = Service::query();
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
    }
    $services = $query->paginate(10);
    $services->appends($request->all());
    return view('admin.services.services', compact('services'));
}

    public function statistics()
    {
        $totalServices = Service::count();
        $availableServices = Service::where('availability', true)->count();
        $unavailableServices = Service::where('availability', false)->count();
        $totalUsers = User::count();
        return view('admin.services.statistics', compact('totalServices', 'availableServices', 'unavailableServices', 'totalUsers'));
    }
    public function create()
    {
        return view('admin.services.create');
    }

    public function store(AdminServiceRequest $request)
    {
        $validated = $request->validated();
        $validated['availability'] = $request->has('availability') ? true : false;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/services'), $imageName);
            $validated['image'] = 'uploads/services/' . $imageName;
        }
        Service::create($validated);
        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }
    public function update(AdminServiceUpdateRequest $request, Service $service)
    {
        $validated = $request->validated();
        $service->name = $validated['name'];
        $service->description = $validated['description'];
        $service->price = $validated['price'];
        $service->duration = $validated['duration'];
        $service->availability = $request->has('availability'); // checkbox

        if ($request->hasFile('image')) {
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'uploads/services/' . $imageName;
            $image->move(public_path('uploads/services'), $imageName);

            $service->image = $imagePath;
        }

        $service->save();

        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }

}
