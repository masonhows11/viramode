<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Notification;
use App\Services\Basket\Contracts\BasketInterface;
use App\Services\Basket\DBStorage;
use Illuminate\Pagination\Paginator;
// use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use Illuminate\Support\Facades;

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

        Paginator::useBootstrapFour();
        Paginator::defaultView('vendor.pagination.my-custom-paginate');

        Facades\View::composer('admin_end.include.header', function (View $view) {
            $view->with(['unseenComments' => Comment::where('seen', 0)->get(), 'notifications' => Notification::where('read_at', 0)->get()]);
        });
    }
}
