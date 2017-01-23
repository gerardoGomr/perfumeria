<?php

namespace Perfumeria\Providers;

use Illuminate\Support\ServiceProvider;
use Perfumeria\Infraestructura\Inventario\DoctrineCategoriasProductosRepositorio;

class CategoriasProductosRepositorioServiceProvider extends ServiceProvider
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
        $this->app->bind('Perfumeria\Dominio\Inventario\Repositorios\CategoriasProductosRepositorio', function ($app) {
            return new DoctrineCategoriasProductosRepositorio($app['em']);
        });
    }
}
