<?php
namespace csi0n\Exception;

use csi0n\Exception\Exception;
use Illuminate\Support\ServiceProvider;

/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/14/16
 * Time: 16:50
 */
class ExceptionServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'csi0n');
        $this->publishes([
            __DIR__ . '/views'                     => base_path('resources/views/vendor/csi0n/mail'),
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
        $this->app['ExceptionRepository'] = $this->app->singleton('ExceptionRepository', function ($app) {
            return new ExceptionRepository($app);
        });
    }

    public function provides()
    {
        return ['ExceptionRepository'];
    }
}
