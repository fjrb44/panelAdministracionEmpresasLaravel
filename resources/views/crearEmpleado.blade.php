@extends('layouts.master')

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="/empresas/{{$empresa->id}}">Volver a {{$empresa->name}}</a>
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
                    <div class="card-header">Empleado</div>

                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input id="apellido" type="text" name="apellido" class="form-control" value="{{old('apellido')}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" class="form-control" value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input id="telefono" type="number" name="telefono" class="form-control" value="{{old('telefono')}}">
                            </div>
                            <button type="submit" class="btn btn-success">
                                Crear
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
