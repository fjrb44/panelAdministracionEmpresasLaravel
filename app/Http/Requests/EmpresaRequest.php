<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();

        return [
            "name" => ["required"],
            "email" => ["required", "email","unique:users,email"],
            "logo" => ["required", "image","mimes:jpeg,png,jpg,gif,wepb","max:2048", "dimensions:min_width=100,min_height=100"],
            "web" => ["required", "regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/"]
        ];
    }
}
