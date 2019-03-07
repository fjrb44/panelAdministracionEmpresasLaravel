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
        $idiomaSesion = Session::get('idioma');

        if (in_array($idiomaSesion, Config::get('app.locales'))) {
          $locale = $idiomaSesion;
        } else {
            $locale = Config::get('app.locale');
        }

        App::setLocale($locale);

        return $next($request);

    }
}
