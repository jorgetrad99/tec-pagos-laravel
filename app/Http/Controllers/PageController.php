<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function services()
    {
        return view('services', [
            'services' => Service::with('user')->latest()->paginate()
        ]);
    }

    public function service(Service $service)
    {
        return view('service', ['service' => $service]);
    }
}
