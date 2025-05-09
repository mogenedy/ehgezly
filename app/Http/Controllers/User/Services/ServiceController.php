<?php

namespace App\Http\Controllers\User\Services;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function showServices()
    {
        $services=Service::paginate(6);
        return view('user.services.services',compact('services'));
    }


    public function index()
    {
        $services=Service::paginate(6);
        return view('user.index')->with('services', $services);
    }
}
