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
                    <div class="card-header">Empresa</div>

                    <div class="card-body">
                        <form action="/empresas" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="name">
                                    Nombre
                                </label>
                                <input id="name" type="text" name="name" class="form-control" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" class="form-control" value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <label for="web">Web</label>
                                <input id="web" type="text" name="web" class="form-control" value="{{old('web')}}">
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input id="logo" type="file" name="logo" class="form-control">
                            </div>

                            <button type="submit">
                                Crear
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
