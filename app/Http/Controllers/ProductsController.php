<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpsertProductsRequest;
use App\Models\Products;
use App\Models\ProductsCategories;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        return view('products/index',[
            'products'=>Products::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        return view('products/create',[
            'categories'=>ProductsCategories::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UpsertProductsRequest  $request
     * @return Redirect
     */
    public function store(UpsertProductsRequest $request)
    {

        $product= new Products($request->validated());
        if($request->hasFile('image')){
            $product->image = $request->file('image')->store('products','public');
        }
        if(!$product->save()) {
            return redirect(route('products.index'))
                ->with('status',__('alerts.Products.Add.Add_Error'))
                ->with('error',true);
        }
        return redirect(route('products.index'))->with('status',__('alerts.Products.Add.Add_Alert',['name'=>$product->name]));

    }

    /**
     * Display the specified resource.
     *
     * @param  Products $Products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $Products)
    {

        return view('products/show',[
            'product'=>$Products,
            'suggestions'=>Products::query()->where('category_id','=',$Products->category_id)
                ->where('id','!=',$Products->id)
                ->limit(3)->get(),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Products $Products
     * @return view
     */
    public function edit(Products $Products)
    {

        return view('products/edit',[
            'product'=>$Products,
            'categories'=>ProductsCategories::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpsertProductsRequest  $request
     * @param  Products $Products
     * @return redirect
     */
    public function update(UpsertProductsRequest $request, Products $Products)
    {
        if (isset($Products)) {
            $oldImage=$Products->image;
            $Products->fill($request->validated());


            if($request->hasFile('image')){

                if(Storage::exists($oldImage)){
                    Storage::delete($oldImage);
                }

                $Products->image = $request->file('image')->store('products','public');
            }
            if(!$Products->save()){
                return redirect(route('products.index'))
                    ->with('status',__('alerts.Products.Edit.Edit_Error'))
                    ->with('error',true);
            }
            return redirect(route('products.index'))->with('status',__('alerts.Products.Edit.Edit_Alert',['name'=>$Products->name]));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param  Products $Products
     * @return RedirectResponse|StreamedResponse
     */
    public function downloadImage( Products $Products)
    {
        if(!is_null($Products->image) and Storage::exists($Products->image)){
           return Storage::download($Products->image);
        }
        return Redirect::back();
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  Products $Products
     * @return Response
     */
    public function destroy(Products $Products)
    {
        try{

            if(!is_null($Products->image) and Storage::exists($Products->image) ){
                Storage::delete($Products->image);
            }

            Session::flash('status',__('alerts.Products.Delete.Delete_Alert',['name'=>$Products->name]));
            $Products->delete();
            return response()->json([
                "status"=>'succes',
            ]);
        }catch (\Exception $e){
            Sesssion::flash('status',__('alerts.Products.Delete.Delete_Error'));
            return response()->json([
                "status"=>'error',
                "message"=>'error',
            ])->setStatusCode(500);
        }
    }
}
