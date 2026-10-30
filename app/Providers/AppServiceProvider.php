<?php

namespace App\Providers;

use App\Repository\CommentaireService as CommentaireRepository;
use App\Repository\CommentaireServiceInterface as CommentaireRepositoryInterface;
use App\Repository\DemandeRepository;
use App\Repository\DemandeRepositoryInterface;
use App\Service\CommentaireService;
use App\Service\CommentaireServiceInterface;
use App\Service\DemandeService;
use App\Service\DemandeServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DemandeRepositoryInterface::class, DemandeRepository::class);
        $this->app->bind(CommentaireRepositoryInterface::class, CommentaireRepository::class);
        $this->app->bind(DemandeServiceInterface::class, DemandeService::class);
        $this->app->bind(CommentaireServiceInterface::class, CommentaireService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
