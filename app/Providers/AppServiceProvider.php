<?php

namespace App\Providers;

use App\Events\NewArticleEvent;
use App\Listeners\NewArticleListener;
use Illuminate\Support\ServiceProvider;
use Psy\Readline\Hoa\Event;

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
        \Illuminate\Support\Facades\Event::listen(
            NewArticleEvent::class,
            NewArticleListener::class
        );
    }
}
