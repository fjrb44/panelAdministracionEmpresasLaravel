<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    public function empleado(){
        return $this->hasMany("App\Empleado");
    }
}
