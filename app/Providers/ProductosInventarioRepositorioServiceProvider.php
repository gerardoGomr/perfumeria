<?php

namespace Perfumeria\Providers;

use Illuminate\Support\ServiceProvider;
use Perfumeria\Infraestructura\Inventario\DoctrineProductosInventarioRepositorio;

class ProductosInventarioRepositorioServiceProvider extends ServiceProvider
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
        $this->app->bind('Perfumeria\Dominio\Inventario\Repositorios\ProductosInventarioRepositorio', function ($app) {
            return new DoctrineProductosInventarioRepositorio($app['em']);
        });
    }
}
