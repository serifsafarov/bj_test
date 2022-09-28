<?php

namespace App\Middlewares;

use Auryn\InjectionException;
use Core\Auth;
use Core\Middleware;
use Core\Request;

class AuthMiddleware extends Middleware
{

    /**
     * @throws InjectionException
     */
    public function handle(Request $request): Request
    {
        if (!Auth::user()) {
            if ($request->isXMLHTTP)
                abort(401, 'Unauthorized');
            else
                redirect('/login');
        }
        return $request;
    }
}