<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

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
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Redirect
     */
    public function store(Request $request)
    {
        $product= new Products($request->all());
        if($request->hasFile('image')){
            $product->image = $request->file('image')->store('products','public');
        }
        $product->save();
        return redirect(route('products.index'));
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
            'product'=>$Products
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
            'product'=>$Products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Products $Products
     * @return redirect
     */
    public function update(Request $request, Products $Products)
    {
        if (isset($Products)) {
            $Products->fill($request->all());
            if($request->hasFile('image')){
                $Products->image = $request->file('image')->store('products','public');
            }
            $Products->save();
            return redirect(route('products.index'));
        }
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
            $Products->delete();
            return response()->json([
                "status"=>'succes',
            ]);
        }catch (\Exception $e){
            return response()->json([
                "status"=>'error',
                "message"=>'error',
            ])->setStatusCode(500);
        }
    }
}
