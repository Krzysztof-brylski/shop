<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //

    public function updateStatus(Request $request,Payments $Payments){
        $data=$request->all();
        if($Payments->status !="inProgress"){
            abort(403);
        }
        $Payments->status=$data['status'];
        $Payments->save();
        return Response()->json("ok",200);
    }

}
