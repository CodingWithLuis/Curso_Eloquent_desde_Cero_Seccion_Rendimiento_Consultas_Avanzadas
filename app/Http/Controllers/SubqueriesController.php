<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SubqueriesController extends Controller
{
    public function index(): View
    {
        return view('subqueries.index');
    }
}
