<?php namespace Modules\PageExtention\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\PageExtention\Composers\PageExtentionComposer;

class PageExtentionServiceProvider extends ServiceProvider
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

        view()->composer('page::admin.edit', PageExtentionComposer::class);
        view()->composer('pageextention::admin.edit', PageExtentionComposer::class);
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
            'Modules\PageExtention\Repositories\PageExtentionRepository',
            function () {
                $repository = new \Modules\PageExtention\Repositories\Eloquent\EloquentPageExtentionRepository(new \Modules\PageExtention\Entities\PageExtention());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\PageExtention\Repositories\Cache\CachePageExtentionDecorator($repository);
            }
        );
// add bindings

    }
}
