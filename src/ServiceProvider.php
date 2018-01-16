<?php
namespace Wjh\Tuling;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    public function register()
    {
        $this->app->singleton('tuling', function($app) {
            $config = $app['config']->get('tuling');
            return new Handle($config);
        });
    }

    public function boot()
    {
        $this->publishes([$this->configPath() => config_path('tuling.php') ]);
    }

    protected function configPath()
    {
        return __DIR__ . '/../config/tuling.php';
    }



}