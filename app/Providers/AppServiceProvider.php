<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Notification;
use App\Services\Basket\Contracts\StorageInterface;
use App\Services\Basket\DBStorage;
use App\Services\ServiceTest\FuelConsumption;
use App\Services\ServiceTest\FuelControl;
use App\Services\ServiceTest\ServiceTest;
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

        //// for display app service container
        //// details

        //// use instance global app variable
        // dd($this->app);

        //// use app() helper method
        // dd(app());

        //// any time call the  ServiceTest::class
        //// do any thing like below
        //        $this->app->bind(ServiceTest::class,function (){
        //            return new ServiceTest('multiple');
        //        });

        //// any time call the  FuelConsumption::class
        //// do any thing like below
        //        $this->app->bind(FuelConsumption::class, function () {
        //            return new FuelConsumption('BMW');
        //        });

        //// any time call the  FuelConsumption::class
        //// do any thing like below
        //// use singleton for make an instance once
        //    $this->app->singleton(FuelConsumption::class, function () {
        //          return new FuelConsumption('BMW');
        //    });

        //// use interface
        //// when FuelControl::class call , make an instance FuelConsumption::class
        //        $this->app->singleton(FuelControl::class, function () {
        //            return new FuelConsumption('BMW');
        //        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        $this->app->bind(StorageInterface::class,function(){

            return new DBStorage('cart');
        });

        Paginator::useBootstrapFive();
        Paginator::defaultView('vendor.pagination.custom-paginate');

        Facades\View::composer('admin_end.include.header', function (View $view) {
            $view->with(['unseenComments' => Comment::where('seen', 0)->get(), 'notifications' => Notification::where('read_at', 0)->get()]);
        });
    }
}
