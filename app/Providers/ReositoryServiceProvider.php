<?php

namespace App\Providers;

use App\Repositories\Eloquent\RepositoryAccountQueries;
use App\Repositories\Eloquent\RepositoryAccountWrite;
use App\Repositories\RepositoriesInterface\AccountQueries;
use App\Repositories\RepositoriesInterface\AccountWrite;
use Illuminate\Support\ServiceProvider;

class ReositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AccountQueries::class, RepositoryAccountQueries::class);
        $this->app->bind(AccountWrite::class, RepositoryAccountWrite::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
