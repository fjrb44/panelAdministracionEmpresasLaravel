<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\EditEmpresaRequest;
use App\Http\Requests\EmpleadoRequest;
use Session;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    public function index(){
        $empresas = Empresa::paginate(10);

        return view('empresa.index', compact('empresas'));
    }

    public function create(){
        return view('empresa.create');
    }

    public function store(EmpresaRequest $request){

        $empresa = new Empresa();

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $name = $empresa->id.time().$file->getClientOriginalName();

            $file->move(public_path("storage"), $name);
        }


        $empresa->name = $request->input('name');
        $empresa->email = $request->input('email');
        $empresa->web = $request->input('web');
        $empresa->logo = $name;

        $empresa->save();
        Session::flash('correcto', "La empresa ha sido creada correctamente.");

        return redirect("empresas/post");
    }

    public function show($id){
        $empresa = Empresa::find($id);

        if(empty($empresa)){
            return redirect("empresas");
        }

        return view("empresa.show", compact("empresa"));
    }

    public function showEmp($id){
        $empresa = Empresa::find($id);
        if(empty($empresa)){
            return redirect("empresas");
        }

        $empleados = Empleado::where('empresa_id', $id)->paginate(10);

        return view("empresa.showEmp", compact("empresa", "empleados"));
    }

    public function edit($id){
        $empresa = Empresa::find($id);
        if(empty($empresa)){
            return redirect("empresas");
        }
        return view("empresa.edit", compact("empresa"));
    }

    public function update(EditEmpresaRequest $request, $id){
        $empresa = Empresa::find($id);
        $aux = false;

        if(empty($empresa)){
            return redirect("empresas");
        }

        if($request->hasFile('logo')){
            Storage::delete("public/".$empresa->logo);

            $file = $request->file('logo');
            $name = $empresa->id.time().$file->getClientOriginalName();

            $file->move(public_path("storage"), $name);

            $empresa->logo = $name;
            $aux = true;
        }

        if(
            $aux ||
            $empresa->name != $request->input('name') ||
            $empresa->email != $request->input('email') ||
            $empresa->web != $request->input('web')
        ){
            $empresa->name = $request->input('name');
            $empresa->email = $request->input('email');
            $empresa->web = $request->input('web');

            $empresa->save();

            Session::flash('edit', "La empresa ha sido editada correctamente.");
        }

        return redirect("empresas/".$id."/edit");
    }

    public function destroy($id){
        $empresa = Empresa::find($id);

        if(empty($empresa)){
            return redirect("empresas");
        }

        Empresa::find($id)->delete();

        Storage::delete("public/".$empresa->logo);

        Session::flash('borrar', "La empresa ha sido borrada correctamente.");

        return redirect("/empresas");
    }

    public function createEmpleado($id){
        $empresa = Empresa::find($id);

        if(empty($empresa)){
            Session::flash('fallo', "La empresa no existe.");
            return redirect("empresas/");
        }

        return view('empresa.createEmpleado', compact('empresa'));
    }

    public function storeEmpleado($id, EmpleadoRequest $request){
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

        return redirect("empresas/".$id."/empleado");
    }
}
