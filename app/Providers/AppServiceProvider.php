<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Billing\Strips;

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

        view()->composer("layout.blog-sidebar",function($view){
            $view->with("published",\App\Post::archives());
        });
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // \App::singleton("App\Billing\Strips",function(){
        //     return new \App\Billing\Strips(config("services.stripe.secret"));
        // });
        $this->app->singleton(Strips::class,function(){
            return new Strips(config("services.stripe.secret"));
        });
    }
}
