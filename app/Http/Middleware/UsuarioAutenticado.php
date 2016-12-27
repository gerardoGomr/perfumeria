<?php
namespace Tentaciones\Http\Middleware;

use Closure;

class UsuarioAutenticado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // debe haber un usuario logueado
        if (!$request->session()->has('usuario')) {
            return redirect('login');
        }

        return $next($request);
    }
}
