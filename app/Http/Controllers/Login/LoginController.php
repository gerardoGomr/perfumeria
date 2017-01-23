<?php
namespace Perfumeria\Http\Controllers\Login;

use Perfumeria\Dominio\Usuarios\Repositorios\UsuariosRepositorio;
use Illuminate\Http\Request;
use Perfumeria\Dominio\Usuarios\Usuario;
use Perfumeria\Http\Controllers\Controller;

/**
 * Class LoginController
 * @package GDI\Http\Controllers
 * @author Gerardo Adrián Gómez Ruiz
 * @version 1.0
 */
class LoginController extends Controller
{
    /**
     * @var UsuariosRepositorio
     */
    private $usuariosRepositorio;

    /**
     * LoginController constructor.
     * @param UsuariosRepositorio $usuariosRepositorio
     */
    public function __construct(UsuariosRepositorio $usuariosRepositorio)
    {
        $this->usuariosRepositorio = $usuariosRepositorio;
    }

    /**
     * comprobar la existencia de un usuario, iniciar sesión y retornar la vista principal
     * @param Request $request
     * @return LoginController|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $usuario = new Usuario($username, 'Gerardo', 'Gómez', 'Ruiz');
        if ($username === 'admin' && $password === 'admin') {
            $request->session()->put('usuario', $usuario);

            return redirect('/');
        } else {
            return $this->loginError();
        }

        /*$usuario = $this->usuariosRepositorio->obtenerPorUsername($username);

        if (is_null($usuario)) {
            return $this->loginError();
        }

        if (!$usuario->login($password)) {
            return $this->loginError();
        }

        $request->session()->put('usuario', $usuario);

        return redirect('/');*/
    }

    /**
     * @return $this
     */
    private function loginError()
    {
        return view('login')->with('error', 'Usuario y/o contraseña incorrectos');
    }

    /**
     * borrar al usuario de la sesión
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        request()->session()->forget('usuario');

        return redirect('/');
    }
}