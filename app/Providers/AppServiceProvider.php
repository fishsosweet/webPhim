<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Http\Service\MovieService\HomeMovieServiceController;
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
        Paginator::useBootstrap();
        $homeMovieService = app(HomeMovieServiceController::class);

        View::share([
            'Sliders' => $homeMovieService->getSlides(),
            'Categories' => $homeMovieService->getCates(),
        ]);
    }
}
