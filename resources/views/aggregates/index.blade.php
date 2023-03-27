@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Numero Ventas</th>
                                <th>Total Ventas</th>
                                <th>Promedio Ventas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->number_sales }}</td>
                                <td>$ {{ number_format($employee->total_sale_by_employee, 2) }}</td>
                                <td>$ {{ number_format($employee->average_sales, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>País</th>
                                <th>Total Hospitales Activos</th>
                                <th>Total Hospitales Inactivos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $country)
                            <tr>
                                <td>{{ $country->name }}</td>
                                <td>{{ $country->active_hospitals }}</td>
                                <td>{{ $country->inactive_hospitals }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
