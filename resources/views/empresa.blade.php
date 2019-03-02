@extends('layouts.master')

@section('titulo', $empresa->name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <img class="empresa-logo" src="../storage/{{ $empresa->logo }}" alt="{{ $empresa->name }}">
            </div>
            <div class="col-12 mb-3 mt-3">
                <p>{{ $empresa->email }}</p>
            </div>
            @if(sizeof($empresa->empleado) === 0)
                <div class="alert alert-warning">
                    No tiene ningun empleado
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empleados as $empleado )
                            <tr>
                                <th scope="row">{{ $empleado->nombre }}</th>
                                <td>{{ $empleado->apellido }}</td>
                                <td>{{ $empleado->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $empleados->links() }}
            @endif

        </div>
    </div>
@endsection