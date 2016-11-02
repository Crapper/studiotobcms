<?php namespace Modules\Carousel\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Carousel\Composers as Composers;

class CarouselServiceProvider extends ServiceProvider
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

        view()->composer('home', Composers\HomeCarouselComposer::class);
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
            'Modules\Carousel\Repositories\CarouselRepository',
            function () {
                $repository = new \Modules\Carousel\Repositories\Eloquent\EloquentCarouselRepository(new \Modules\Carousel\Entities\Carousel());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Carousel\Repositories\Cache\CacheCarouselDecorator($repository);
            }
        );
// add bindings

    }
}
