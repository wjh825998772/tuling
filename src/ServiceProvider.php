<?php
namespace Wjh\Tuling;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('tuling', function($app) {
            $config = $app['config']->get('tuling');
            return new Tuling($config);
        });
    }

    /**
     * 发布配置文件
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([$this->configPath() => config_path('tuling.php') ]);
    }

    /**
     * 配置文件路径
     *
     * @return string
     */
    protected function configPath()
    {
        return __DIR__ . '/../config/tuling.php';
    }



}