@extends('layouts.master')

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

                    @if(sizeof($empresas) === 0)
                        <div class="alert alert-warning">
                            Para crear un empleado necesita crear primero una empresa.
                        </div>
                    @else
                        <div class="card-body">
                            <form action="/empleados" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="nombre">
                                        {{ trans('trad.t-nombre') }}
                                    </label>
                                    <input id="nombre" type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
                                </div>
                                <div class="form-group">
                                    <label for="apellido">
                                        {{ trans('trad.t-apellido') }}
                                    </label>
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
                                <div class="form-group">
                                    <label for="empresa">{{ trans('trad.h-empresa') }}</label>
                                    <select name="empresa" id="empresa" class="form-control">
                                        <option value="" disabled hidden selected></option>
                                        @foreach($empresas as $empresa)
                                            <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit">
                                    {{ trans('trad.b-crear') }}
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
