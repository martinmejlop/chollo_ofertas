<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $USER = 'admin'; // Cambia esto por un usuario seguro
        $PASS = 'chollo2024'; // Cambia esto por una contraseña segura

        if (
            !isset($_SERVER['PHP_AUTH_USER']) ||
            $_SERVER['PHP_AUTH_USER'] !== $USER ||
            $_SERVER['PHP_AUTH_PW'] !== $PASS
        ) {
            header('WWW-Authenticate: Basic realm="Zona Administrador"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'No autorizado';
            exit;
        }

        return $next($request);
    }
}
