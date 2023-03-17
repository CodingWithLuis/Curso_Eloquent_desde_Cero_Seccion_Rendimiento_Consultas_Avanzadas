<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\View\View;

class AggregatesController extends Controller
{
    public function index(): View
    {
        return view('aggregates.index');
    }
}
