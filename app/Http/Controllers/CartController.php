<?php

namespace App\Http\Controllers;

use App\Dtos\Cart\CartDto;
use App\Dtos\Cart\CartItemDto;
use App\Http\Requests\UpsertProductsRequest;
use App\Models\Products;
use App\Models\ProductsCategories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use \Illuminate\Support\Facades\Session;
use function Symfony\Component\Mime\Header\all;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return view|JsonResponse
     */
    public function index(){
        dd(Session::get('cart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Products $Products
     * @return JsonResponse
     */
    public function store(Products $Products)
    {

        $cart = Session::get('cart',new CartDto());

        $items=$cart->getCart();
        if (Arr::exists($items,$Products->id)){
            $items[$Products->id]->incrementQuantity();
        }else{
            $cartItemDto = new CartItemDto($Products,1);

            $items[$Products->id] = $cartItemDto;
        }
        $cart->setCart($items);
        $cart->incrementTotalQuantity();
        $cart->incrementTotalSum($Products->price);
        Session::put('cart',$cart);

        return Response::json([
            "status"=>'Success',
        ]);
    }

}
