@extends('layouts.master')

@section('titulo', $empresa->name)

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="/empresas">{{ trans('trad.h-empresas') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empresas/{{$empresa->id}}">{{ trans('trad.h-go') }} {{$empresa->name}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empresas/{{$empresa->id}}/empleado">{{ trans('trad.t-b-aniadir') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empresas/{{$empresa->id}}/edit">{{ trans('trad.t-b-edit') }}</a>
    </li>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <img class="empresa-logo" src="{{asset('storage/'.$empresa->logo)}}" alt="{{ $empresa->name }}">
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
                            <th scope="col">{{ trans('trad.t-nombre') }}</th>
                            <th scope="col">{{ trans('trad.t-apellido') }}</th>
                            <th scope="col">{{ trans('trad.t-email') }}</th>
                            <th scope="col">{{ trans('trad.t-tlf') }}</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empleados as $empleado )
                            <tr>
                                <th scope="row">{{ $empleado->nombre }}</th>
                                <td>{{ $empleado->apellido }}</td>
                                <td>{{ $empleado->email }}</td>
                                <td>{{ $empleado->telefono }}</td>
                                <td>
                                    <form action="/empleados/{{$empleado->id}}">
                                        <button class="btn btn-success">{{ trans('trad.t-b-emp') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $empleados->links() }}
            @endif

        </div>
    </div>
@endsection
