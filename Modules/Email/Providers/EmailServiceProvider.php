<?php namespace Modules\Email\Providers;

use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
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
            'Modules\Email\Repositories\EmailRepository',
            function () {
                $repository = new \Modules\Email\Repositories\Eloquent\EloquentEmailRepository(new \Modules\Email\Entities\Email());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Email\Repositories\Cache\CacheEmailDecorator($repository);
            }
        );
// add bindings

    }
}
