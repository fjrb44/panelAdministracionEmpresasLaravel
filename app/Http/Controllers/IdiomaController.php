<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Session;

class IdiomaController extends Controller
{
    public function __invoke($idioma){
        if(in_array($idioma, Config::get('app.locales') ) ){
            Session::put('idioma', $idioma);
        }
        return back();
    }

}
