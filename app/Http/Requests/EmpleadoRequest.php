<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();

        return [
            "nombre" => ["required"],
            "apellido" => ["required"],
            "email" => ["required","email","unique:users,email"],
            "telefono" => ["required"]
        ];
    }
}
