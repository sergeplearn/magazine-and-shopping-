<?php

namespace App\Http\Controllers;

use App\category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);


    }


    public function index()
    {
        //$categorys = category::paginate(5);
        $categorys = category::search(request('search'))->paginate(5);
        return view('mdmagazine.category.index',['categorys'=>$categorys ]);
    }



    public function create(){
        $this->authorize('create', category::class);

        $category = new category();
        return view('mdmagazine.category.create',[ 'category' => $category]);
    }

    public function store(Request $request)
    {
      $category = $request->user()->categorys()->create($this->validating());
      $this->storeimage($category);

        return redirect()->route('category.index')->with('created','u have success');
    }

    public function show(category $category)
    {
        $categoryname =$category->category_name;
        $categories = category::find($category->id)->postproduct()->paginate(6);
        return view('mdmagazine.category.singlecategory',['categories'=>$categories,'categoryname'=>$categoryname]);
    }

    public function edit(category $category)
    {

        return view('mdmagazine.category.edit',compact('category'));
    }

    public function update(Request $request,category $category)
    {
        $this->authorize('update', $category);
        $category->update($this->validating());
        $this->storeimage($category);

        return redirect()->route('category.index');
    }



    public function destroy(category $category)
    {
        $this->authorize('delete', $category);
    $category->delete();
        return redirect()->route('category.create')->with('deleted','datat was errers');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    private function validating()
    {
        return tap(request()->validate([
            'category_name' => 'required',

        ]),function (){
            if (request()->hasfile('image')) {
                request()->validate([
                    'image' => 'file|image|max:5000'
                ]);
            }
        });
    }


    public function storeimage($category)
    {

        if (! is_dir(public_path('/blogcategory'))) {
            mkdir(public_path('/blogcategory'), 0777);
        }

        if (request()->hasfile('image')) {

            $file = request()->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            Image::make($file)->fit(440, 300)->save(public_path('blogcategory/'.$filename));


        }



        if (request()->has('image')) {
            $category->update([
                'image_path' => $filename,



            ]);
        }
    }


}
