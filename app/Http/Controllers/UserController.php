<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        //EJEMPLO has
        // $users = User::query()
        //     ->has('projects')
        //     ->with('projects')
        //     ->get();

        //EJEMPLO has CON FILTRO
        // $users = User::has('projects', '>', 1)
        //     ->get();

        //EJEMPLO whereHas
        // $users = User::query()
        //     ->whereHas('projects', function (Builder $query) {
        //         $query->where('is_active', 1);
        //     })
        //     ->get();

        //EJEMPLO whereHas CON with COMBINADO
        // $users = User::query()
        //     ->whereHas('projects', function (Builder $query) {
        //         $query->where('is_active', 1);
        //     })
        //     ->with('projects', function ($query) {
        //         $query->where('is_active', 1);
        //     })
        //     ->get();

        //EJEMPLO whereHas CON FILTRO EXTRA
        // $users = User::query()
        //     ->whereHas('projects', function (Builder $query) {
        //         $query->where('name', 'like', '%qui%');
        //     }, '>=', 2)
        //     ->get();

        ////EJEMPLO withWhereHas
        // $users = User::query()
        //     ->withWhereHas('projects', function ($query) {
        //         $query->where('is_active', 1);
        //     })
        //     ->get();

        // //EJEMPLO whereRelation
        // $users = User::query()
        //     ->whereRelation('projects', 'is_active', 1)
        //     ->get();
        //

        //EJEMPLO whereRelation con FILTRO
        // $users = User::query()
        //     ->whereRelation('projects', 'id', '>', 5)
        //     ->get();

        //EJEMPLO whereDoesntHave
        $users = User::query()
            ->whereDoesntHave('projects')
            ->get();

        return view('users.index', compact('users'));
    }
}
