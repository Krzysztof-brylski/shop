<?php

namespace App\Http\Controllers;

use App\ValueObjects\Cart;
use App\Models\Products;
use App\ValueObjects\CartItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use \Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return view|JsonResponse
     */
    public function index(){
        $session=Session::get('cart',new Cart());
        return view('cart/index', [
                'cart'=>$session->get_data(),
                'total'=>$session->get_total()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Products $Products
     * @return JsonResponse
     */
    public function store(Products $Products)
    {
        $cart = Session::get('cart',new Cart());

        $cart=$cart->add_item(new CartItem($Products->id));

        Session::put('cart',$cart);

        return Response()->json([
            'status'=>'OK'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Products $Products
     * @return JsonResponse
     */
    public function destroy(Products $Products)
    {

        try{


            $cart = Session::get('cart',new Cart());
            $cart=$cart->destroy_Item(new CartItem($Products->id));

            Session::put('cart',$cart);

            Session::flash('status',__('alerts.Cart.Delete.Delete_Alert'));
            return response()->json([
                "status"=>'succes',

            ]);
        }catch (\Exception $e){
            Session::flash('status',__('alerts.Cart.Delete.Delete_Error'));
            Session::flash('error',true);
            return response()->json([
                "status"=>'error',
                "message"=>'error',
            ])->setStatusCode(500);
        }

    }


}
