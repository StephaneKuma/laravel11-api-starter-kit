<?php

declare(strict_types=1);

namespace App\Bootstrappers;

use Illuminate\Foundation\Events\DiagnosingHealth;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;

class RoutingBootstrapper
{
    /**
     * Invoke the class instance.
     *
     * This method sets up the routing middleware and groups for the application.
     *
     * @param \Illuminate\Routing\Router $router The router instance.
     * @return void
     */
    public function __invoke(Router $router): void
    {
        // Setup the web middleware group with the routes defined in the web.php file
        $router->middleware('web')
            ->group(base_path(path: 'routes/web.php'));

        // Setup the API middleware group with the routes defined in the api.php file
        $router->middleware('api')
            ->prefix('api')
            ->group(base_path(path: 'routes/api.php'));

        // Setup the console middleware group with the routes defined in the console.php file
        $router->middleware('web')
            ->group(base_path(path: 'routes/console.php'));

        // Setup a route for the "/up" endpoint that dispatches the DiagnosingHealth event
        // and returns a view file with the health status
        $router->middleware('web')
            ->get('/up', function () {
                // Dispatch the DiagnosingHealth event
                Event::dispatch(event: new DiagnosingHealth());

                // Return a view file with the health status
                return View::file(
                    path: base_path(
                        path: '/vendor/laravel/framework/src/Illuminate/Foundation/resources/health-up.blade.php',
                    ),
                );
            });
    }
}
