<?php

namespace Perfumeria\Providers;

use Illuminate\Support\ServiceProvider;
use Perfumeria\Infraestructura\Perfumes\DoctrineNotasRepositorio;

class NotasRepositorioServiceProvider extends ServiceProvider
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
        $this->app->bind('Perfumeria\Dominio\Perfumes\Repositorios\NotasRepositorio', function($app) {
            return new DoctrineNotasRepositorio($app['em']);
        });
    }
}
