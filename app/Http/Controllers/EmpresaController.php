<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Empleado;
use Illuminate\Http\Request;
use App\Http\Request\empresaRequest;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::paginate(2);

        return view('empresas', compact('empresas'));
    }

    public function create()
    {
        
    }

    public function store(empresaRequest $request)
    {
        $empresa = new Empresa();

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $name = $empresa->id.time().$file->getClientOriginalName();

            $file->move("storage/", $name);
            //$file->move(public_path().'/storage/', $name);
        }

        
        $empresa->name = $request->input('name');
        $empresa->email = $request->input('email');
        $empresa->logo = $name;

        //$empresa->save();
    }

    public function show($id)
    {   
        $empresa = Empresa::find($id);
        if(empty($empresa)){
            return redirect("empresas");
        }

        $empleados = Empleado::where('empresa_id', $id)->paginate(10);

        return view("empresa", compact("empresa", "empleados"));
    }

    public function edit(Empresa $empresa)
    {
        
    }

    public function update(empresaRequest $request, Empresa $empresa)
    {
        
    }

    public function destroy(Empresa $empresa)
    {
        
    }
}