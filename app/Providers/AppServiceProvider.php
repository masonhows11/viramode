<?php

namespace App\Providers;

// use App\Models\Comment;
// use App\Models\Notification;
// use Illuminate\Support\Facades\Schema;
// use Illuminate\View\View;
// use Illuminate\Support\Facades;
use App\Services\Basket\Basket;
use App\Services\Basket\DBStorage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Services\BasketPrice\BasketPrice;
use App\Services\BasketPrice\ShippingPrice;
use App\Services\Basket\Contracts\BasketInterface;
use App\Services\BasketPrice\Contracts\PriceInterface;


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
        //
        $this->app->bind(PriceInterface::class,function($app){

            $basketPrice =  new BasketPrice($app->make(Basket::Class));
            $shippingPrice = new ShippingPrice($basketPrice);

            return $shippingPrice;
            // return $basketPrice;

        });
        //
        Paginator::useBootstrapFour();
        Paginator::defaultView('vendor.pagination.my-custom-paginate');

        // Facades\View::composer('admin_end.include.header', function (View $view) {
        //     $view->with(['unseenComments' => Comment::where('seen', 0)->get(), 'notifications' => Notification::where('read_at', 0)->get()]);
        // });
    }
}
