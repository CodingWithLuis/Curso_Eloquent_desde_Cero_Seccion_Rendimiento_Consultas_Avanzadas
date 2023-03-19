@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    {{--@foreach ($projects as $project)
                    <li>Project: {{ $project->name }} Usuario: {{$project->user->name }}</li>
                    @endforeach --}}

                    {{--@foreach ($products as $product)
                    <li>Producto: {{ $product->name }} Precio: {{$product->price }}</li>
                    @endforeach --}}

                    {{--@foreach ($sales_by_employee as $employee)
                    <li>Vendedor: {{ $employee->first_name }} {{ $employee->last_name }} Ventas: {{$employee->total_sales }}</li>
                    @endforeach --}}

                    @foreach ($users as $user)
                    <li>Usuario: {{ $user->name }} Ultimo Login: {{$user->last_login->locale('es_ES')->diffForHumans() }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
