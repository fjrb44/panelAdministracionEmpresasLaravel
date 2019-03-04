<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\EditEmpresaRequest;
use Session;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    public function index(){
        $empresas = Empresa::paginate(10);

        return view('empresas', compact('empresas'));
    }

    public function create(){
        return view('crearEmpresa');
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

        return view("empresa", compact("empresa"));
    }

    public function showEmp($id){
        $empresa = Empresa::find($id);
        if(empty($empresa)){
            return redirect("empresas");
        }

        $empleados = Empleado::where('empresa_id', $id)->paginate(10);

        return view("empresaEmpleado", compact("empresa", "empleados"));
    }

    public function edit($id){
        $empresa = Empresa::find($id);
        if(empty($empresa)){
            return redirect("empresas");
        }
        return view("editarEmpresa", compact("empresa"));
    }

    public function update(EditEmpresaRequest $request, $id){
        $empresa = Empresa::find($id);
        if(empty($empresa)){
            return redirect("empresas");
        }

        if($request->hasFile('logo')){
            Storage::delete("public/".$empresa->logo);

            $file = $request->file('logo');
            $name = $empresa->id.time().$file->getClientOriginalName();

            $file->move(public_path("storage"), $name);

            $empresa->logo = $name;
        }

        $empresa->name = $request->input('name');
        $empresa->email = $request->input('email');
        $empresa->web = $request->input('web');

        $empresa->save();

        Session::flash('edit', "La empresa ha sido editada correctamente. ");
        return redirect("empresas/".$id."/edit");
    }

    public function destroy($id){
        $empresa = Empresa::find($id);
        
        Empresa::find($id)->delete();

        Storage::delete("public/".$empresa->logo);

        Session::flash('borrar', "La empresa ha sido borrada correctamente.");

        return redirect("/empresas");
    }
}