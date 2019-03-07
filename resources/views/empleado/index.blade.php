@extends('layouts.master')

@section('content')
    <div class="container">
        @if(Session::has('fallo'))
            <div class="alert alert-danger">
                {{Session::get('fallo')}}
            </div>
        @endif
        @if(Session::has('borrar'))
            <div class="alert alert-success">
                {{Session::get('borrar')}}
            </div>
        @endif
        <div class="row justify-content-center">
            @if(sizeof($empleados) == 0)
            <div class="alert alert-warning">
                No hay ningun empleado
            </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ trans('trad.t-nombre') }}</th>
                            <th scope="col">{{ trans('trad.t-apellido') }}</th>
                            <th scope="col">{{ trans('trad.t-email') }}</th>
                            <th scope="col">{{ trans('trad.t-tlf') }}</th>
                            <th scope="col">{{ trans('trad.h-empresa') }}</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr>
                                <th scope="row">{{ $empleado->nombre }}</th>
                                <td>{{ $empleado->apellido }}</td>
                                <td>{{ $empleado->email }}</td>
                                <td>{{ $empleado->telefono }}</td>
                                <td>{{ $empleado->empresa->name }}</td>
                                <td>
                                    <form action="empleados/{{$empleado->id}}">@csrf
                                        <button type="submit" class="btn btn-success">{{ trans('trad.t-b-emp') }}</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="empleados/{{$empleado->id}}" method="post">@csrf
                                        <button type="submit" class="btn btn-danger">{{ trans('trad.t-b-del') }}</button>
                                        <input type="hidden" name="_method" value="delete" />
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
