<?php

namespace App\Http\Controllers\Categore;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Product;

class CategorieController extends Controller
{

    use AttachFilesTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('pages.categorie.index',[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Categorie::create([
            'name'=>$request->name,
            'image'=>$request->file('image')->getClientOriginalName(),

        ]);
        $this->uploadFile($request,'image','upload_attachments');
        return redirect()->route('categorie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products=Product::where('categorie_id',$id)->get();
        return view('temp.product-list',[

            'products'=>$products,
            'categories'=>Categorie::all(),
            'showProduct'=>Product::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie=Categorie::find($id);
        return view('pages.categorie.edit',[
            'categorie'=>$categorie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        $categorie=Categorie::find($request->id);
        $categorie->update([
            'name'=>$request->name
        ]);

        if($request->hasFile('image')){
            $this->deleteFile($categorie->image);

            $this->uploadFile($request,'image','upload_attachments');
            $image_new = $request->file('image')->getClientOriginalName();
                $categorie->image = $categorie->image !== $image_new ? $image_new : $categorie->image;
        }
        return redirect()->route('categorie.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->deleteFile($request->file_name);
        $categorie=Categorie::find($request->id);
        $categorie->destroy($request->id);
        return redirect()->back();
    }
}
