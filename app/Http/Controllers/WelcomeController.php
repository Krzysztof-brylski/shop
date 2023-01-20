<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsCategories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use function Symfony\Component\Mime\Header\all;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return view|JsonResponse
     */
    public function index(Request $request){

        $filters = $request->query('filters');
        $paginate = $request->query('paginate') != null ? $request->query('paginate') : 9;
        $order=$request->query('order') != null ? $request->query('order') : 'asc';

        $query = Products::query();
        $query=$query->orderBy('price',strtolower($order));
        if(!is_null($filters)){
            //dd($paginate);
            if(array_key_exists('categories',$filters)){
                $query=$query->whereIn('category_id',$filters['categories']);
            }
            if(isset($filters['price_min']) and isset($filters['price_max'])){
                $query=$query->whereBetween('price',[(float)$filters['price_min'], (float)$filters['price_max']]);
            }

            return Response()->json($query->paginate($paginate));
        }
        return view('welcome',[
            'products'=> $query->paginate($paginate),
            'categories'=>ProductsCategories::orderby('name','ASC')->get(),
        ]);
    }

}
