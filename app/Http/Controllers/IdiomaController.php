<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public function __invoke($idioma){
        $lang = ['esp', 'eng'];
        if(in_array($idioma, $lang)){
            Session::put('locale', $idioma);
        }

        return back();
    }

}
