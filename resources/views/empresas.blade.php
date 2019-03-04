@extends('layouts.master')

@section('content')
    <div class="container">
        @if(Session::has('fallo'))
            <div class="alert alert-danger">
                {{Session::get('fallo')}}
            </div>
        @endif
        <div class="row justify-content-center">
            @if(sizeof($empresas) == 0)
            <div class="alert alert-warning">
                No hay ninguna empresa
            </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Logo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Web</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                            <tr>
                                <th scope="row">
                                    <img class="imagen-tabla" src="{{asset('storage/'.$empresa->logo)}}" alt="{{ $empresa->name }}">
                                </th>
                                <td>{{ $empresa->name }}</td>
                                <td>{{ $empresa->email }}</td>
                                <td><a href="{{ $empresa->web }}">{{ $empresa->web }}</a></td>
                                <td>
                                    <form action="empresas/{{$empresa->id}}">
                                        <button type="submit" class="btn btn-success">Ver empresa</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="empresas/{{$empresa->id}}/empleado">
                                        <button type="submit" class="btn btn-success">Ver empleados</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="empresas/{{$empresa->id}}/delete">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $empresas->links() }}
            @endif
        </div>
    </div>
@endsection
