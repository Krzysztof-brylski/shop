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
        //dd($order);
        $query = Products::query();
        $query->orderBy('price',strtolower($order));
        if(!is_null($filters)){

            if(array_key_exists('categories',$filters)){
                $query->whereIn('category_id',$filters['categories']);
            }
            if(!is_null($filters['price_min'])){
                $query->where('price','>=',$filters['price_min']);
            }
            if(!is_null($filters['price_max'])){
                $query->where('price','<=',$filters['price_min']);
            }

            return Response()->json([
                'data'=>$query->get()
            ]);
        }
        return view('welcome',[
            'products'=> $query->paginate($paginate),
            'categories'=>ProductsCategories::orderby('name','ASC')->get(),
        ]);
    }

}
