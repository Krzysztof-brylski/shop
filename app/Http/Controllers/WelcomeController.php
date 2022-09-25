<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsCategories;
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
     * @return view
     */
    public function index(){
        return view('welcome',[
            'products'=>Products::paginate(10),
            'categories'=>ProductsCategories::all()
        ]);
    }

}
