<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class Idioma
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        /*
        $idioma = Session::get('idioma');
        if(empty($idioma)){
            $idioma = 'es';
        }

        App::setLocale($idioma);

        return $next($request);
        */
        $raw_locale = Session::get('idioma');

        if (in_array($raw_locale, Config::get('app.locales'))) {
          $locale = $raw_locale;
        }
        else {
            $locale = Config::get('app.locale');
        }
        
        App::setLocale($locale);
        
        //return (Config::get('app.locale'));
        return $next($request);
        
    }
}
