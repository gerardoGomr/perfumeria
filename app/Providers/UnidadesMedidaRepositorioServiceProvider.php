<?php

namespace Perfumeria\Providers;

use Illuminate\Support\ServiceProvider;
use Perfumeria\Infraestructura\Inventario\DoctrineUnidadesMedidaRepositorio;

class UnidadesMedidaRepositorioServiceProvider extends ServiceProvider
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
        $this->app->bind('Perfumeria\Dominio\Inventario\Repositorios\UnidadesMedidaRepositorio', function ($app) {
            return new DoctrineUnidadesMedidaRepositorio($app['em']);
        });
    }
}