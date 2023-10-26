<?php

namespace App\Http\Controllers\shop;

use App\shop_category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShophomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   $shop_categorys = shop_category::search(request('search'))->paginate(8);
        //$shop_categorys = shop_category::paginate(8);

        return view('shop.home.index',compact('shop_categorys'));
    }
}
