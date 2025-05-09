<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function showServices(Request $request)
    {
        $query = Service::query();
        if ($request->has('availability')) {
            if ($request->availability === 'true') {
                $query->where('availability', true);
            } elseif ($request->availability === 'false') {
                $query->where('availability', false);
            }
        }
        $services = $query->get();
        return response()->json($services);
    }
}
