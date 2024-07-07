<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(
            model: \App\Models\PersonalAccessToken::class,
        );

        ResetPassword::createUrlUsing(callback: function (object $notifiable, string $token) {
            return config(
                key: 'app.frontend_url',
            ) . "/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
    }
}
