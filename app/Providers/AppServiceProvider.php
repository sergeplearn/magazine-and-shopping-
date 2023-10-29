<?php

namespace App\Providers;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\category;
use App\shop_category;
use App\timeinterval;
use Illuminate\Support\Facades\View;
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
        View::composer(['forms.blog_form','welcome','home','mdmagazine.products.edit','mdmagazine.products.newpost','mdmagazine.products.singlepost','mdmagazine.category.singlecategory','mdmagazine.time.index'],function ($view){
            $view->with('categorys',category::category());
        });

        View::composer(['mdmagazine.reservation.create','mdmagazine.reservation.view.create','mdmagazine.reservation.edit'],function ($view){
            $view->with('times',timeinterval::active()->get());
        });

        View::composer(['forms.shop_product','shop.product.newproduct','shop.product.edit','shop.category.singelcategory'],function ($view){
            $view->with('shop_category',shop_category::all());
        });

        View::composer(['shop.product.create','shop.product.newproduct','shop.product.edit',
            'mdmagazine.reservation.create','mdmagazine.reservation.edit','mdmagazine.products.index'
            ,'mdmagazine.products.newpost','mdmagazine.products.edit','mdmagazine.category.create','mdmagazine.category.index',
            'mdmagazine.category.edit','shop.category.index','shop.category.edit','shop.category.create',
             'mdmagazine.time.index','mdmagazine.time.create','mdmagazine.time.edit',
            'mdmagazine.reservation.index','mdmagazine.reservation.create','mdmagazine.reservation.edit',
            'notification.admin.unreadnewuser','home','admin.index','admin.create'],function ($view){
            $view->with('count',\App\User::find(Auth::user()->id)->unreadNotifications->count());
        });




    }
}
