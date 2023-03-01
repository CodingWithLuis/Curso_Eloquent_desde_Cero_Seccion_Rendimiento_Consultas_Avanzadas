<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        //CONSULTA 1: USANDO ELOQUENT
        $projects = Project::with('user')->get();

        //CONSULTA 2: USANDO QUERY BUILDER
        // $projects = DB::table('projects')
        //     ->join('users', 'projects.user_id', '=', 'users.id')
        //     ->get();

        //CONSULTA 3: USANDO SQL
        // $projects = DB::select('SELECT * FROM projects INNER JOIN users ON projects.user_id = users.id');

        return view('home', compact('projects'));
    }
}
