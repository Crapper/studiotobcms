<?php namespace Modules\Section\Providers;

use Illuminate\Support\ServiceProvider;

class SectionServiceProvider extends ServiceProvider
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
            'Modules\Section\Repositories\SectionRepository',
            function () {
                $repository = new \Modules\Section\Repositories\Eloquent\EloquentSectionRepository(new \Modules\Section\Entities\Section());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Section\Repositories\Cache\CacheSectionDecorator($repository);
            }
        );
// add bindings

    }
}
