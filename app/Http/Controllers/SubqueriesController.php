<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Login;
use App\Models\Product;
use App\Models\Project;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\View\View;

class SubqueriesController extends Controller
{
    public function index(): View
    {

        //EJEMPLO 1
        $projects = Project::query()
            ->with('user')
            ->orderBy(User::select('name')->whereColumn('users.id', 'projects.user_id'), 'DESC')
            ->get();

        //EJEMPLO 2
        $products = Product::query()
            ->select('name', 'price')
            ->where(
                'price',
                '>',
                (Product::avg('price'))
            )
            ->get();

        //EJEMPLO 3
        $sales = Sale::query()
            ->select('employee_id')
            ->selectRaw('SUM(total_sale) AS total_sales')
            ->groupBy('employee_id');

        $sales_by_employee = Employee::query()
            ->select('employees.first_name', 'employees.last_name', 'sales.total_sales')
            ->joinSub($sales, 'sales', function (JoinClause $join) {
                $join->on('employees.id', '=', 'sales.employee_id');
            })
            ->orderBy('employees.last_name', 'ASC')
            ->get();

        //EJEMPLO 4
        $users = User::query()
            ->addSelect([
                'last_login' => Login::query()->select('created_at')
                    ->whereColumn('users.id', 'logins.user_id')
                    ->latest()
                    ->take(1)
            ])
            ->withCasts(['last_login' => 'datetime'])
            ->get();

        return view('subqueries.index', compact('sales_by_employee', 'users'));
    }
}
