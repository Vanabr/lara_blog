<?php

namespace App\Providers;

use App\Billing\Stripe;
use App\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.blog-sidebar', function ($view) {
             $view->with('archives', Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Stripe::class, function () {
            return new Stripe(config('services.stripe.secret'));
        });
        /*App::bind('App\Billing\Stripe', function () {
            return new \App\Billing\Stripe(config('services.stripe.secret'));
        });*/

        //Две строки ниже - идентичны
        //$stripe = resolve('App\Billing\Stripe');
        //$stripe = app('App\Billing\Stripe');
    }
}
