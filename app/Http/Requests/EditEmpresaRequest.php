<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditEmpresaRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();

        return [
            "name" => ["required"],
            "email" => ["required"],
            "logo" => ["image","mimes:jpeg,png,jpg,gif,wepb","max:2048", "dimensions:min_width=100,min_height=100"],
            "web" => ["required"]
        ];
    }
}
