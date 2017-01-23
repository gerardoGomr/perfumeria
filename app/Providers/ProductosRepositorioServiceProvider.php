<?php

namespace Perfumeria\Providers;

use Illuminate\Support\ServiceProvider;
use Perfumeria\Infraestructura\Productos\DoctrineProductosRepositorio;

class ProductosRepositorioServiceProvider extends ServiceProvider
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
        $this->app->bind('Perfumeria\Dominio\Productos\Repositorios\ProductosRepositorio', function ($app) {
            return new DoctrineProductosRepositorio($app['em']);
        });
    }
}
