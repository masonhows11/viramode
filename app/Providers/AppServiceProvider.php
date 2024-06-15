<?php

namespace App\Providers;

// use App\Models\Comment;
// use App\Models\Notification;
// use Illuminate\Support\Facades\Schema;
// use Illuminate\View\View;
// use Illuminate\Support\Facades;
use App\Services\Basket\Contracts\BasketInterface;
use App\Services\Basket\DBStorage;
use App\Services\BasketPrice\BasketPrice;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        $this->app->bind(BasketInterface::class,function($app){

            return new DBStorage();
        });


        $this->app->bind(PriceInterface::class,function($app){

            return new BasketPrice();
        });
        Paginator::useBootstrapFour();
        Paginator::defaultView('vendor.pagination.my-custom-paginate');

        // Facades\View::composer('admin_end.include.header', function (View $view) {
        //     $view->with(['unseenComments' => Comment::where('seen', 0)->get(), 'notifications' => Notification::where('read_at', 0)->get()]);
        // });
    }
}
