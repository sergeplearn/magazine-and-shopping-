<?php

namespace App\Http\Controllers\shop;

use App\shop_category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class ShopcategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);


    }
    public function index()

    {
        $this->authorize('viewAny', shop_category::class);

        $categorys = shop_category::search(request('search'))->paginate(5);
        //$categorys = shop_category::paginate(5);
        return view('shop.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $this->authorize('create', shop_category::class);
        $shop_category   = new shop_category();
        return view('shop.category.create',compact('shop_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->authorize('create', shop_category::class);
       $shop_category = $request->user()->shop_categorys()->create($this->shopcategoryvalidate());
       $this->storeimage($shop_category);
        return redirect()->route('shop_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shop_category  $shop_category
     * @return \Illuminate\Http\Response
     */
    public function show(shop_category $shop_category)
    {
        $category_name = $shop_category->shop_category_name;

        $shop_categorys = shop_category::find($shop_category->id)->shopping()->paginate(8);

        return view('shop.category.singelcategory',compact('shop_categorys','category_name'));
    }

   public function edit(shop_category $shop_category)
   {
       $this->authorize('update', $shop_category);
       return view('shop.category.edit',compact('shop_category'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shop_category  $shop_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shop_category $shop_category)
    {
        $this->authorize('update', $shop_category);
        $shop_category->update($this->shopcategoryvalidate());
        $this->storeimage($shop_category);
        return redirect()->route('shop_category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shop_category  $shop_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(shop_category $shop_category)
    {
        $this->authorize('delete', $shop_category);
        $shop_category->unsearchable();
        $shop_category->delete();
        return redirect()->route('shop_category.index');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function shopcategoryvalidate()
    {
        return request()->validate([
            'shop_category_name'=>'required',
            'image_path'=>'sometimes|file|image|max:5000'

        ]);
    }

    private function storeimage($shop_category)
    {

        if (! is_dir(public_path('/shopimg'))) {
            mkdir(public_path('/shopimg'), 0777);
        }

        if (request()->hasfile('image_path')) {

            $file = request()->file('image_path');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            Image::make($file)->fit(440, 300)->save(public_path('shopimg/' . $filename));


        }


        if (request()->has('image_path')) {
            $shop_category->update([
                'image_path' => $filename,


            ]);
        }
    }

}
