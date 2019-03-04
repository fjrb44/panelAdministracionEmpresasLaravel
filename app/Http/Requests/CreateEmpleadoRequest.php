<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmpleadoRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();

        return [
            "nombre" => ["required"],
            "apellido" => ["required"],
            "email" => ["required"],
            "telefono" => ["required"],
            "empresa" => ["required"]
        ];
    }
}
