<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        // REDIRECCIONA A LOGIN SI A EXPITRADO LA SESION, ES NECESARIO PARA QUE NO RECUERDE LA SESION, 
        // HACE REFERENCIA AL  'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, EN kernel.php
        // return redirect()->guest('login');
    }
}
