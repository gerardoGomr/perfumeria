<?php

namespace Perfumeria\Providers;

use Illuminate\Support\ServiceProvider;
use Perfumeria\Infraestructura\Diseniadores\DoctrineDiseniadoresRepositorio;

class DiseniadoresRepositorioServiceProvider extends ServiceProvider
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
        $this->app->bind('Perfumeria\Dominio\Diseniadores\Repositorios\DiseniadoresRepositorio', function($app) {
            return new DoctrineDiseniadoresRepositorio($app['em']);
        });
    }
}
