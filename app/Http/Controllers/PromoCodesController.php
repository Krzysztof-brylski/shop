<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PromoCodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $codes=PromoCode::paginate(10);
       return view('promoCodes/index',['codes'=>$codes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('promoCodes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        //todo validation
        $data=$request->all();
        PromoCode::create($data);
        return Redirect::to(route("promoCode.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PromoCode::find($id)->delete();
        return back();
    }
}
