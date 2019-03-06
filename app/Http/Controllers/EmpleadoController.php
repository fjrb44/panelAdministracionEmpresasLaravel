<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use App\Http\Requests\CreateEmpleadoRequest;
use Session;

class EmpleadoController extends Controller
{
    public function index(){
        $empleados = Empleado::paginate(10);

        return view('empleado.index', compact('empleados'));
    }

    public function create(){
        $empresas = Empresa::all();
        return view('empleado.create', compact('empresas'));
    }

    public function store(CreateEmpleadoRequest $request){

        $empleado = new empleado();

        $empleado->nombre = $request->input('nombre');
        $empleado->apellido = $request->input('apellido');
        $empleado->email = $request->input('email');
        $empleado->telefono = $request->input('telefono');
        $empleado->empresa_id = $request->input('empresa');

        $empleado->save();
        Session::flash('correcto', "La empleado ha sido creada correctamente.");

        return redirect("empleados/post");
    }

    public function show($id){
        $empleado = Empleado::find($id);

        if(empty($empleado)){
            return redirect("empleados");
        }

        return view("empleado.show", compact("empleado"));
    }

    public function edit($id){
        $empleado = Empleado::find($id);
        if(empty($empleado)){
            return redirect("empleados");
        }
        return view("empleado.edit", compact("empleado"));
    }

    public function update(EmpleadoRequest $request, $id){
        $empleado = Empleado::find($id);

        if(empty($empleado)){
            return redirect("empleados");
        }

        if(
            $empleado->nombre != $request->input('nombre') ||
            $empleado->apellido != $request->input('apellido') ||
            $empleado->email != $request->input('email') ||
            $empleado->telefono != $request->input('telefono')
        ){
            $empleado->nombre = $request->input('nombre');
            $empleado->apellido = $request->input('apellido');
            $empleado->email = $request->input('email');
            $empleado->telefono = $request->input('telefono');

            $empleado->save();

            Session::flash('edit', "El empleado ha sido editado correctamente.");
        }

        return redirect("empleados/".$id."/edit");
    }

    public function destroy($id){
        $empleado = Empleado::find($id);

        if(empty($empleado)){
            return redirect("empleados");
        }

        empleado::find($id)->delete();

        Session::flash('borrar', "El empleado ha sido borrado correctamente.");

        return redirect("/empleados");
    }
}
