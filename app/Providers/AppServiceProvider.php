<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use App\Observers\ProjectObserver;
use App\Observers\StatusObserver;
use App\Observers\TaskObserver;
use Illuminate\Support\ServiceProvider;

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
        Project::observe( ProjectObserver::class );
        Status::observe( StatusObserver::class );
        Task::observe( TaskObserver::class );
    }
}
