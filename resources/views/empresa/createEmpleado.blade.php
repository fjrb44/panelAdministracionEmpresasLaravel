@extends('layouts.master')

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="/empresas">{{ trans('trad.h-empresa') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empresas/{{$empresa->id}}">{{ trans('trad.h-go')}} {{$empresa->name}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empresas/{{$empresa->id}}/empleados">{{ trans('trad.h-empl') }} {{$empresa->name}}</a>
    </li>
@endsection

@section('content')
    <div class="container">
        @if(Session::has('correcto'))
            <div class="alert alert-success">
                {{Session::get('correcto')}}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('trad.e-employee') }}</div>

                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="nombre">{{ trans('trad.t-nombre') }}</label>
                                <input id="nombre" type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
                            </div>
                            <div class="form-group">
                                <label for="apellido">{{ trans('trad.t-apellido') }}</label>
                                <input id="apellido" type="text" name="apellido" class="form-control" value="{{old('apellido')}}">
                            </div>
                            <div class="form-group">
                                <label for="email">{{ trans('trad.t-email') }}</label>
                                <input id="email" type="email" name="email" class="form-control" value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <label for="telefono">{{ trans('trad.t-tlf') }}</label>
                                <input id="telefono" type="number" name="telefono" class="form-control" value="{{old('telefono')}}">
                            </div>
                            <button type="submit" class="btn btn-success">
                                {{ trans('trad.b-crear') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
