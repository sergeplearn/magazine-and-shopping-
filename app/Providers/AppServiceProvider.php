<?php

namespace App\Providers;


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
            $view->with('categorys',category::paginate(6));
        });

        View::composer(['welcome','mdmagazine.reservation.create','mdmagazine.reservation.edit'],function ($view){
            $view->with('times',timeinterval::active()->get());
        });

        View::composer(['forms.shop_product','shop.product.newproduct','shop.product.edit','shop.category.singelcategory'],function ($view){
            $view->with('shop_category',shop_category::all());
        });

    }
}
