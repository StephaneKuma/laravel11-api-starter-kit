<?php

declare(strict_types=1);

namespace App\Bootstrappers;

use Illuminate\Foundation\Configuration\Exceptions;

class ExceptionsBootstrapper
{
    /**
     * Invoke the class instance.
     *
     * This method is invoked when the class instance is used as a function.
     *
     * @param \Illuminate\Foundation\Configuration\Exceptions $exceptions The Laravel exceptions configuration instance.
     * @return void
     */
    public function __invoke(Exceptions $exceptions): void {}
}
