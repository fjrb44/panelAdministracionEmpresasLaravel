@extends('layouts.master')

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="/empleados">{{ trans('trad.e-employees') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empleados/{{$empleado->id}}">{{ trans('trad.h-go') }} {{$empleado->nombre}}</a>
    </li>
@endsection

@section('content')
    <div class="container">
        @if(Session::has('edit'))
            <div class="alert alert-success">
                {{Session::get('edit')}}
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
                    <div class="card-header">{{ trans('trad.e-empresa') }}</div>

                    <div class="card-body">
                        <form action="/empleados/{{$empleado->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="_method" value="PUT" />
                            <div class="form-group">
                                <label for="name">
                                    {{ trans('trad.t-nombre') }}
                                </label>
                                @if(empty(old('nombre')))
                                    <input id="nombre" type="text" name="nombre" class="form-control" value="{{$empleado->nombre}}">
                                @else
                                    <input id="nombre" type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="apellido">
                                    {{ trans('trad.t-nombre') }}
                                </label>
                                @if(empty(old('apellido')))
                                    <input id="apellido" type="text" name="apellido" class="form-control" value="{{$empleado->apellido}}">
                                @else
                                    <input id="apellido" type="text" name="apellido" class="form-control" value="{{old('apellido')}}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">{{ trans('trad.t-email') }}</label>
                                @if(empty(old('email')))
                                    <input id="email" type="email" name="email" class="form-control" value="{{$empleado->email}}">
                                @else
                                    <input id="email" type="email" name="email" class="form-control" value="{{old('email')}}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="telefono">{{ trans('trad.t-tlf') }}</label>

                                @if(empty(old('web')))
                                    <input id="telefono" type="number" name="telefono" class="form-control" value="{{$empleado->telefono}}">
                                @else
                                    <input id="telefono" type="number" name="telefono" class="form-control" value="{{old('telefono')}}">
                                @endif
                            </div>

                            <button type="submit">
                                {{ trans('trad.b-edit') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
