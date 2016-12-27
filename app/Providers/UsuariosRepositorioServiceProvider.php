<?php
namespace Tentaciones\Providers;

use Tentaciones\Infraestructura\Usuarios\DoctrineUsuariosRepositorio;
use Illuminate\Support\ServiceProvider;

class UsuariosRepositorioServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Tentaciones\Dominio\Usuarios\Repositorios\UsuariosRepositorio', function($app) {
            return new DoctrineUsuariosRepositorio($app['em']);
        });
    }
}
