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
            @if(sizeof($empresas) == 0)
            <div class="alert alert-warning">
                {{ trans('trad.t-n-emp') }}
            </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ trans('trad.t-logo') }}</th>
                            <th scope="col">{{ trans('trad.t-nombre') }}</th>
                            <th scope="col">{{ trans('trad.t-email') }}</th>
                            <th scope="col">{{ trans('trad.t-web') }}</th>
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
                                    <form action="empresas/{{$empresa->id}}">@csrf
                                        <button type="submit" class="btn btn-success">
                                            {{ trans('trad.t-b-ver') }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="empresas/{{$empresa->id}}/empleados">@csrf
                                        <button type="submit" class="btn btn-success">{{ trans('trad.t-b-emp') }}</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="empresas/{{$empresa->id}}" method="post">@csrf
                                        <button type="submit" class="btn btn-danger">{{ trans('trad.t-b-del') }}</button>
                                        <input type="hidden" name="_method" value="delete" />
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
