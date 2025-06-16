<?php

namespace App\Providers;

use App\Models\User;
use Dedoc\Scramble\Support\Generator\OpenApi;
use Dedoc\Scramble\Support\Generator\SecurityScheme;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Laravel\Sanctum\PersonalAccess;
use Laravel\Sanctum\Sanctum;
use Dedoc\Scramble\Scramble;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

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
        Paginator::useTailwind();
        Gate::define('admin', function ($user){
        return $user->is_admin === true;
        });
 // Konfigurasi Scramble (API documentation generator)Add commentMore actions
        Scramble::configure()
            ->routes(function (Route $route) {
                return Str::startsWith($route->getPrefix(), 'api');
            })
            ->withDocumentTransformers(function (OpenApi $openApi): void {
                $openApi->secure(
                    SecurityScheme::http('bearer')
                );
            });
    }
}