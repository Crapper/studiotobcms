<?php namespace Modules\Menulist\Providers;

use Illuminate\Support\ServiceProvider;

class MenulistServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Menulist\Repositories\MenulistRepository',
            function () {
                $repository = new \Modules\Menulist\Repositories\Eloquent\EloquentMenulistRepository(new \Modules\Menulist\Entities\Menulist());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Menulist\Repositories\Cache\CacheMenulistDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Menulist\Repositories\MenuitemRepository',
            function () {
                $repository = new \Modules\Menulist\Repositories\Eloquent\EloquentMenuitemRepository(new \Modules\Menulist\Entities\Menuitem());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Menulist\Repositories\Cache\CacheMenuitemDecorator($repository);
            }
        );
// add bindings


    }
}
