<?php

namespace Modules\Ilocations\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Ilocations\Events\Handlers\RegisterIlocationsSidebar;

class IlocationsServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterIlocationsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('countries', array_dot(trans('ilocations::countries')));
            $event->load('provinces', array_dot(trans('ilocations::provinces')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('ilocations', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
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
            'Modules\Ilocations\Repositories\CountryRepository',
            function () {
                $repository = new \Modules\Ilocations\Repositories\Eloquent\EloquentCountryRepository(new \Modules\Ilocations\Entities\Country());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ilocations\Repositories\Cache\CacheCountryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Ilocations\Repositories\ProvinceRepository',
            function () {
                $repository = new \Modules\Ilocations\Repositories\Eloquent\EloquentProvinceRepository(new \Modules\Ilocations\Entities\Province());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ilocations\Repositories\Cache\CacheProvinceDecorator($repository);
            }
        );
// add bindings


    }
}