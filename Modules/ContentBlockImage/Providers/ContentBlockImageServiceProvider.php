<?php namespace Modules\ContentBlockImage\Providers;

use Illuminate\Support\ServiceProvider;

class ContentBlockImageServiceProvider extends ServiceProvider
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
            'Modules\ContentBlockImage\Repositories\ContentBlockImageRepository',
            function () {
                $repository = new \Modules\ContentBlockImage\Repositories\Eloquent\EloquentContentBlockImageRepository(new \Modules\ContentBlockImage\Entities\ContentBlockImage());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ContentBlockImage\Repositories\Cache\CacheContentBlockImageDecorator($repository);
            }
        );
// add bindings

    }
}
