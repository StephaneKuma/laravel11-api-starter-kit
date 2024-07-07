<?php

declare(strict_types=1);

namespace App\Bootstrappers;

use Illuminate\Foundation\Configuration\Middleware;

class MiddlewareBootstrapper
{
    /**
     * Invoke the class instance.
     *
     * This method is called when the MiddlewareBootstrapper is used as a
     * callback. It receives an instance of the Middleware class and can be
     * used to configure the middleware stack for the application.
     *
     * @param \Illuminate\Foundation\Configuration\Middleware $middleware The middleware configuration instance.
     * @return void
     */
    public function __invoke(Middleware $middleware): void {}
}
