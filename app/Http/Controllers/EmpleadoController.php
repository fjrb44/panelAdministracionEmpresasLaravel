<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use Session;

class EmpleadoController extends Controller
{
    public function index(){


    }

    public function create($id){
        $empresa = Empresa::find($id);

        if(empty($empresa)){
            Session::flash('fallo', "La empresa no existe.");
            return redirect("empresas/");
        }

        return view('crearEmpleado', compact('empresa'));
    }

    public function store($id, EmpleadoRequest $request){
        $empresa = Empresa::find($id);

        if(empty($empresa)){
            Session::flash('fallo', "La empresa no existe.");
            return redirect("empresas/");
        }

        $empleado = new Empleado();

        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->email = $request->input('email');
        $empleado->telefono = $request->input('telefono');
        $empleado->empresa_id = $id;

        $empleado->save();
        Session::flash('correcto', "El empleado se ha añadido correctamente.");

        return redirect("empresas/".$id);
    }

    public function show(Empleado $empleado){


    }

    public function edit(Empleado $empleado){


    }

    public function update(Request $request, Empleado $empleado){


    }

    public function destroy(Empleado $empleado){


    }
}
