<?php

namespace SlyDeath\Webpack;

use Illuminate\Support\ServiceProvider;

class WebpackServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerHelpers();
        $this->publishConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigs();
    }

    /**
     * Register helpers file
     */
    public function registerHelpers()
    {
        require_once __DIR__ . '/helpers.php';
    }

    /**
     * Merge config file
     */
    public function mergeConfigs()
    {
        $config_path = __DIR__ . '/../config/webpack.php';
        $this->mergeConfigFrom($config_path, 'webpack');
    }

    /**
     * Publish config
     */
    public function publishConfig()
    {
        $config_path = __DIR__ . '/../config/webpack.php';
        $publish_path = base_path('config/webpack.php');

        $this->publishes([$config_path => $publish_path], 'config');
    }
}
