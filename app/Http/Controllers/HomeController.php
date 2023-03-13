<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
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
        // $projects = Project::with('user', 'task')->get();

        //CONSULTA 2: USANDO QUERY BUILDER
        // $projects = DB::table('projects')
        //     ->join('users', 'projects.user_id', '=', 'users.id')
        //     ->join('tasks', 'projects.task_id', '=', 'tasks.id')
        //     ->get();

        //CONSULTA 3: USANDO SQL
        // $projects = DB::select('select * from `projects` inner join `users` on `projects`.`user_id` = `users`.`id` inner join `tasks` on `projects`.`task_id` = `tasks`.`id`');

        //Ejemplo Chunk
        // Project::where('is_active', 0)->chunkById(500, function (Collection $projects) {
        //
        //     foreach ($projects as $project) {
        //         $project->is_active = 1;
        //         $project->save();
        //     }
        // });

        // $projects = Project::with('user')->get();


        //TRABAJANDO CON INNER JOIN
        // $projects = Project::query()
        //     ->join('users', 'projects.user_id', '=', 'users.id')
        //     ->select('projects.*', 'users.id', 'users.name AS username')
        //     ->get();

        //TRABAJANDO CON LEFT JOIN
        // $projects = Project::query()
        //     ->leftJoin('users', 'projects.user_id', '=', 'users.id')
        //     ->select('projects.*', 'users.id', 'users.name AS username')
        //     ->get();

        //TRABAJANDO CON RIGHT JOIN
        // $projects = Project::query()
        //     ->rightJoin('users', 'projects.user_id', '=', 'users.id')
        //     ->select('projects.*', 'users.id', 'users.name AS username')
        //     ->get();

        // TRABAJANDO CON CROSS JOIN
        // $projects = Project::query()
        //     ->crossJoin('users')
        //     ->select('projects.*', 'users.name AS username')
        //     ->get();

        //TRABAJANDO JOIN AVANZADO
        // $projects = Project::query()
        //     ->join('users', function ($join) {
        //         $join->on('projects.user_id', '=', 'users.id')
        //             ->where('users.name', 'admin');
        //     })
        //     ->select('projects.*', 'users.name AS username')
        //     ->get();

        // EJEMPLO CON CURSOR

        foreach (Project::cursor() as $project) {
        }

        return view('home');
    }
}
