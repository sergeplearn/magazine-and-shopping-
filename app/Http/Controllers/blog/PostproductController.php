<?php

namespace App\Http\Controllers\blog;

//use App\Http\Requests\PostproductRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostproductRequest;
use App\postproduct;
use Intervention\Image\ImageManagerStatic as Image;

class PostproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $this->authorize('viewAny', postproduct::class);
        $postproducts = postproduct::search(request('search'))->paginate(5);
       // $postproducts = postproduct::paginate(5);

        return view('mdmagazine.products.index',compact('postproducts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', postproduct::class);

        $postproduct = new postproduct();
        return view('mdmagazine.products.newpost',compact('postproduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostproductRequest $request)
    {

       $this->authorize('create', postproduct::class);

       $postproduct = $request->user()->postproducts()->create($request->validated());
       $this->storeimages($postproduct);
        return redirect()->route('postproduct.index')->with('created','message');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\postproduct  $postproduct
     * @return \Illuminate\Http\Response
     */
    public function show(postproduct $postproduct)
    {

        return view('mdmagazine.products.singlepost',['postproduct'=>$postproduct]);

    }

    public function edit(postproduct $postproduct)
    {
        $this->authorize('update', $postproduct);
        return view('mdmagazine.products.edit',['postproduct'=>$postproduct]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\postproduct  $postproduct
     * @return \Illuminate\Http\Response
     */
    public function update(PostproductRequest $request, postproduct $postproduct)
    {
        $this->authorize('update', $postproduct);
        $postproduct->update($request->validated());
        $this->storeimages($postproduct);
        return redirect()->route('postproduct.index')->with('created','message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\postproduct  $postproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(postproduct $postproduct)
    {
        $this->authorize('delete', $postproduct);
        $postproduct->unsearchable();
        $postproduct->delete();
        return redirect()->route('postproduct.index')->with('deleted','message');
    }




    public function storeimages($postproduct)
    {

        if (! is_dir(public_path('/images'))) {
            mkdir(public_path('/images'), 0777);
        }

        if (request()->hasfile('image')) {

            $file = request()->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            Image::make($file)->fit(900, 400)->save(public_path('images/'.$filename));


        }


        if (request()->hasfile('image')) {

            $second = request()->file('image');

            $extension = $second->getClientOriginalExtension();
            $secondex = time().'.'.$extension;

            Image::make($second)->fit(440, 300)->save(public_path('sm_img/'.$secondex));


        }



        if (request()->has('image')) {
            $postproduct->update([
                'image_path' => $filename,
                'sm_img' => $secondex,


            ]);
        }
    }
}
