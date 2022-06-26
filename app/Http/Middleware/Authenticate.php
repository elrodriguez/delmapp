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
        $central_domain = env('CENTRAR_DOMAIN');
        $domain = $_SERVER['SERVER_NAME'];
        if (!$request->expectsJson()) {
            if ($domain == $central_domain) {
                return route('landlord_login');
            } else {
                return route('login');
            }
        }
    }
}
