<?php
namespace csi0n\ExceptionEmail;

use csi0n\ExceptionEmail\ExceptionEmail;
use Illuminate\Support\ServiceProvider;

/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/14/16
 * Time: 16:50
 */
class ExceptionMailServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'csi0n');
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/vendor/csi0n/mail'),
            __DIR__ . '/config/exception_mail.php' => config_path('exception_mail.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['ExceptionEmailRepository'] = $this->app->singleton('ExceptionEmailRepository', function ($app) {
            return new ExceptionEmailRepository($app);
        });
    }

    public function provides()
    {
        return ['ExceptionEmailRepository'];
    }
}