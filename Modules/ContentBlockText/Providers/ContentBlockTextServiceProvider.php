<?php namespace Modules\ContentBlockText\Providers;

use Illuminate\Support\ServiceProvider;

class ContentBlockTextServiceProvider extends ServiceProvider
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
            'Modules\ContentBlockText\Repositories\ContentBlockTextRepository',
            function () {
                $repository = new \Modules\ContentBlockText\Repositories\Eloquent\EloquentContentBlockTextRepository(new \Modules\ContentBlockText\Entities\ContentBlockText());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ContentBlockText\Repositories\Cache\CacheContentBlockTextDecorator($repository);
            }
        );
// add bindings

    }
}
