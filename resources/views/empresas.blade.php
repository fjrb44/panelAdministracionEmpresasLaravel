@extends('layouts.master')

@section('content')
    <div class="container">
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
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                            <tr>
                                <th scope="row">
                                    <img class="imagen-tabla" src="storage/{{ $empresa->logo }}" alt="{{ $empresa->name }}">
                                </th>
                                <td>{{ $empresa->name }}</td>
                                <td>{{ $empresa->email }}</td>
                                <td>
                                    <form action="empresas/{{$empresa->id}}">
                                        <button type="submit" class="btn btn-success">Ver empresa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection