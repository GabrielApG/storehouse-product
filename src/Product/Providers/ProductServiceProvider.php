<?php

namespace ResultSystems\Storehouse\Product\Providers;

use Illuminate\Support\ServiceProvider;
use ResultSystems\Storehouse\Providers\SecurityServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Service provider boot
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->loadStorehouseViews();
        $this->loadStorehouseTranslations();
        $this->publishStorehouseConfiguration();
        $this->publishStorehouseAssets();
        $this->publishMigrations();
    }

    /**
     * Service provider registration
     */
    public function register()
    {
        if (! isset($this->app['security.router'])) {
            $this->app->register('ResultSystems\SecurityRouter\Providers\SecurityRouterServiceProvider');
        }
        $this->registerBindings();
    }

    /**
     * Register IoC Bindings
     */
    protected function registerBindings()
    {
        /*
        $this->app->singleton(
            'security.get', function ($app) {
                return new \ResultSystems\SecurityRouter\Providers\SecurityRouterServiceProvider;
            }
        );
        */

        $this->mergeConfigFrom(__DIR__.'/../Resources/config/storehouse-product.php', 'storehouse-product');
    }

    /**
     * Register routes.
     */
    protected function registerRoutes()
    {
        /** @var \Illuminate\Routing\Router $router */
        $router = $this->app['router'];

        $group = [];
        $group['prefix'] = $this->app['config']->get('storehouse-product.route_prefix', 'storehouse/product');
        $namespace='\ResultSystems\Storehouse\Product\Http\Controllers';
        $group['namespace'] = $namespace;
        $group['as'] = 'storehouse.product.';

        $security=$this->app['security.router'];
        $router->group($security
            ->setFixedSecurity($group)
            ->getConfigPackage('storehouse-product'),
            function () use ($router, $namespace, $security) {
                require __DIR__.'/../Http/routes.php';
        });
    }

    /**
     * Publish dashboard configuration.
     */
    protected function publishStorehouseConfiguration()
    {
        $this->publishes([
            __DIR__.'/../Resources/config/storehouse-product.php' => config_path('storehouse-product.php')
        ], 'config');
    }

    /**
     * Publish storehouse assets to the public path
     */
    protected function publishStorehouseAssets()
    {
        $this->publishes([
            __DIR__.'/../Resources/assets' => public_path('resultsystems/storehouse/product')
        ], 'assets');

        $this->publishes([
            __DIR__.'/../Resources/dist' => public_path('resultsystems/storehouse')
        ], 'assets');
    }

    /**
     * Load storehouse views.
     */
    protected function loadStorehouseViews()
    {
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'storehouse-product');
    }

    /**
     * Storehouse translations
     */
    protected function loadStorehouseTranslations()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'storehouse-product');
    }

    /**
     * Publish migration file.
     */
    private function publishMigrations()
    {
        $this->publishes([__DIR__.'/../Resources/migrations/' => base_path('database/migrations')], 'migrations');
    }

    /**
     *
     * @return array
     */
    public function provides()
    {
        return ['storehouse-product'];
    }
}
