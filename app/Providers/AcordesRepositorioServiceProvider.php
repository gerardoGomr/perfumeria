<?php

namespace Perfumeria\Providers;

use Illuminate\Support\ServiceProvider;
use Perfumeria\Infraestructura\Perfumes\DoctrineAcordesRepositorio;

class AcordesRepositorioServiceProvider extends ServiceProvider
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
        $this->app->bind('Perfumeria\Dominio\Perfumes\Repositorios\AcordesRepositorio', function ($app) {
            return new DoctrineAcordesRepositorio($app['em']);
        });
    }
}
