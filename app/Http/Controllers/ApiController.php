<?php

namespace App\Http\Controllers;

use App\Models\Hotline;
use App\Models\Policestation;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $hotlines = Hotline::all();
         return response()->json($hotlines);

    }
    public function policestation()
    {
        $police = Policestation::all();
         return response()->json($police);

    }
}
