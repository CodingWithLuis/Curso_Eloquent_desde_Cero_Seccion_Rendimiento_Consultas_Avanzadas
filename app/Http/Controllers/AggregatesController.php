<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Employee;
use App\Models\Hospital;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class AggregatesController extends Controller
{
    public function index(): View
    {

        $employees = Employee::query()
            ->withCount('sales as number_sales')
            ->withSum('sales as total_sale_by_employee', 'total_sale')
            ->withAvg('sales as average_sales', 'total_sale')
            ->get();

        $countries = Country::query()
            ->withCount([
                'hospitals as active_hospitals' => function (Builder $query) {
                    $query->where('is_active', 1);
                },
                'hospitals as inactive_hospitals' => function (Builder $query) {
                    $query->where('is_active', 0);
                }
            ])
            ->get();

        return view('aggregates.index', compact('employees', 'countries'));
    }
}
