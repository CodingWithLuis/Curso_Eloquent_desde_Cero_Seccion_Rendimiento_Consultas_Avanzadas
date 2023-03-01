<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('user', 'media')->get();

        return view('projects.index', compact('projects'));
    }
}
