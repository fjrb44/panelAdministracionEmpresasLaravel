<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use Session;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::paginate(10);

        return view('empresas', compact('empresas'));
    }

    public function create()
    {
        return view('crearEmpresa');
    }

    public function store(EmpresaRequest $request)
    {
        
        $empresa = new Empresa();
        
        if($request->hasFile('logo')){
            echo "POTENCIAAAA";
            $file = $request->file('logo');
            $name = $empresa->id.time().$file->getClientOriginalName();

            //$file->move("storage/", $name);
            $file->move(public_path("storage"), $name);

            echo $name." Esto es name";
        }else{
            echo "no hay potencia";
        }

        
        $empresa->name = $request->input('name');
        $empresa->email = $request->input('email');
        $empresa->logo = $name;
        
        $empresa->save();
        Session::flash('correcto', "La empresa ha sido creada correctamente.");
        
        return redirect("empresas/post");
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
