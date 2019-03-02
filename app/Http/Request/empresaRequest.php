<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class empresaRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $datos = $this->validationData();
        
        return [
            "name" => ["required"],
            "email" => ["required"],
            "logo" => ["required"]
        ];
    }
}