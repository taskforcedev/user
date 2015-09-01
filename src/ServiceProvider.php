<?php namespace Taskforcedev\User;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->config();
        $this->views();
        $this->routes();
    }

    private function config()
    {
        $this->publishes([
            __DIR__.'/config/laravel-user.php' => config_path('laravel-user.php'),
        ], 'user-config');

        $this->mergeConfigFrom(
            __DIR__.'/config/laravel-user.php',
            'laravel-user'
        );

        // Merge overridden Config
        $published = __DIR__.'/../../../../config/laravel-user.php';
        if (file_exists($published)) {
            $this->mergeConfigFrom(
                $published,
                'laravel-user'
            );
        }
    }

    private function views()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'laravel-user');
    }

    private function routes()
    {
        require __DIR__ . '/Http/routes.php';
    }

    public function register()
    {
        //
    }

    public function provides()
    {
        return [];
    }
}
