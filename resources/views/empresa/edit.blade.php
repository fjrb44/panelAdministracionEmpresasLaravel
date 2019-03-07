@extends('layouts.master')

@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="/empresas">{{ trans('trad.h-empresa') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empresas/{{$empresa->id}}">{{ trans('trad.h-go') }} {{$empresa->name}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empresas/{{$empresa->id}}/empleados">{{ trans('trad.h-empl') }} {{$empresa->name}}</a>
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
                        <form action="/empresas/{{$empresa->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="_method" value="PUT" />
                            <div class="form-group">
                                <label for="name">
                                    {{ trans('trad.t-nombre') }}
                                </label>
                                @if(empty(old('name')))
                                    <input id="name" type="text" name="name" class="form-control" value="{{$empresa->name}}">
                                @else
                                    <input id="name" type="text" name="name" class="form-control" value="{{old('name')}}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">{{ trans('trad.t-email') }}</label>
                                @if(empty(old('email')))
                                    <input id="email" type="email" name="email" class="form-control" value="{{$empresa->email}}">
                                @else
                                    <input id="email" type="email" name="email" class="form-control" value="{{old('email')}}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="web">{{ trans('trad.t-web') }}</label>

                                @if(empty(old('web')))
                                    <input id="web" type="text" name="web" class="form-control" value="{{$empresa->web}}">
                                @else
                                    <input id="web" type="text" name="web" class="form-control" value="{{old('web')}}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="logo">{{ trans('trad.t-logo') }}</label>
                                <input id="logo" type="file" name="logo" class="form-control">
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
