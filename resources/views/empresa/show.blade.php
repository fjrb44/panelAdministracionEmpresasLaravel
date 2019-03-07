@extends('layouts.master')

@section('titulo', $empresa->name)

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="/empresas">{{ trans('trad.h-empresas') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empresas/{{$empresa->id}}/empleados">{{ trans('trad.t-b-ver') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{$empresa->id}}/empleado">{{ trans('trad.t-b-aniadir') }}</a>
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
                <a href="{{ $empresa->web }}">{{ $empresa->web }}</p>
            </div>
        </div>
    </div>
@endsection
