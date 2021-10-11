<?php

namespace App\Providers;

use App\Repositories\RepositoriesInterface\AccountQueries;
use App\Repositories\Eloquent\RepositoryAccountQueries;
use App\Repositories\Eloquent\RepositoryAccountWrite;
use App\Repositories\RepositoriesInterface\AccountWrite;
use App\Services\AccountService;
use App\Services\Contracts\AccountServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AccountServiceInterface::class, AccountService::class);
        $this->app->bind(AccountQueries::class, RepositoryAccountQueries::class);
        $this->app->bind(AccountWrite::class, RepositoryAccountWrite::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
