<?php

namespace App\Providers;

use function base_path;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiWeatherStationRoutes();

        $this->mapApiKeycounterRoutes();

        $this->mapApiRoutes();

        $this->mapSmartPlantRoutes();

        $this->mapWebhookRoutes();

        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Rutas para la API de la estación meteorológica
     */
    protected function mapApiWeatherStationRoutes()
    {
        Route::prefix('ws')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/weather_station.php'));
    }

    /**
     * Rutas para la API de la estación meteorológica
     */
    protected function mapApiKeycounterRoutes()
    {
        Route::prefix('keycounter')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/keycounter.php'));
    }

    /**
     * Rutas para los webhooks.
     */
    protected function mapWebhookRoutes()
    {
        Route::prefix('webhook')
            //->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/webhook.php'));
    }

    /**
     * Rutas para los webhooks.
     */
    protected function mapSmartPlantRoutes()
    {
        Route::prefix('smartplant')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/smart_plant.php'));
    }

    /**
     * Rutas para los webhooks.
     */
    protected function mapAirFlightRoutes()
    {
        Route::prefix('airflight')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/airflight.php'));
    }
}
