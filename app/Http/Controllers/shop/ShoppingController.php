<?php

namespace App\Http\Controllers\shop;

use App\shopping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;



class ShoppingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);


    }

    public function index()
    {
        $this->authorize('viewAny', shopping::class);
        $shoppings = shopping::search(request('search'))->paginate(5);
        //$shoppings = shopping::paginate(5);

        return view('shop.product.create',compact('shoppings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', shopping::class);

        $shopping = new shopping();
        return view('shop.product.newproduct',compact('shopping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', shopping::class);
        $shopping =  $request->user()->shoppings()->create($this->shoppingvalidation());
        $this->storeimage($shopping);
        return redirect()->route('shopping.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function show(shopping $shopping)
    {
        return view('shop.product.singleproduct',compact('shopping'));
    }



    public function edit(shopping $shopping)
    {
        $this->authorize('update', $shopping);
        return view('shop.product.edit',compact('shopping'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shopping $shopping)
    {
        $this->authorize('update', $shopping);
        $shopping->update($this->shoppingvalidation());
        $this->storeimage($shopping);
        return redirect()->route('shopping.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(shopping $shopping)
    {
        $this->authorize('delete', $shopping);
        $shopping->delete();
        return redirect()->route('shopping.index');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function shoppingvalidation()
    {
        return tap(request()->validate([
            'title'=>'required',
            'price'=>'required',
            'message'=>'required',
            'shopcategory_id'=>'required',
        ]),function(){
            if (request()->hasfile('image')){
                request()->validate([
                'image'=>'file|image|max:5000',
                ]);
            }

        });
    }







    private function storeimage($shopping)
    {


        if (request()->hasfile('image')) {

            $file = request()->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            Image::make($file)->fit(440, 300)->save(public_path('shopimg/' . $filename));


        }


        if (request()->has('image')) {
            $shopping->update([
                'image_path' => $filename,


            ]);
        }
    }

}
