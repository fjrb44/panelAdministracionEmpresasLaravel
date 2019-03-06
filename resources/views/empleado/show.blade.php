@extends('layouts.master')

@section('titulo', $empleado->nombre)

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="/empleados">Empleados</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empresas/{{$empleado->empresa->id}}/empleados">Ver empleados de {{$empleado->empresa->name}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empleados/{{$empleado->id}}/edit">Editar</a>
    </li>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-3 mt-3">
                <p>{{ $empleado->apellido }}</p>
                <p>{{ $empleado->email }}</p>
                <p>{{ $empleado->telefono }}</p>
            </div>
            <div class="col-12">
                <img class="empresa-logo" src="{{asset('storage/'.$empleado->empresa->logo)}}" alt="{{ $empleado->empresa->name }}">
            </div>
        </div>
    </div>
@endsection
