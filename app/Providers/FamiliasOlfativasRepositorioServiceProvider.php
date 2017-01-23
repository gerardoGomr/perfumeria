<?php

namespace Perfumeria\Providers;

use Illuminate\Support\ServiceProvider;
use Perfumeria\Infraestructura\Perfumes\DoctrineFamiliasOlfativasRepositorio;

class FamiliasOlfativasRepositorioServiceProvider extends ServiceProvider
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
        $this->app->bind('Perfumeria\Dominio\Perfumes\Repositorios\FamiliasOlfativasRepositorio', function($app) {
            return new DoctrineFamiliasOlfativasRepositorio($app['em']);
        });
    }
}
