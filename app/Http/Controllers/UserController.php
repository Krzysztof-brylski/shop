<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Models\Adress;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        return view('users.index',[
            'users'=>User::paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return view
     */
    public function edit(user $user)
    {

        return view('users.edit',[
            'user'=>$user
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditUserRequest $request
     * @param User $user
     * @return Response
     */
    public function update(EditUserRequest $request, user $user)
    {
        $data=$request->validated();
        if($user->hasAddress() ){
            $address = $user->address;
            $address->fill($data);
        }else{
            $address = new Adress($data);
        }
        $user->address()->save($address);
        return redirect(route('user.index'))->with('status',__('alerts.Users.Edit.Edit_Alert',['name'=>$user->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(user $user)
    {
        try{
            $user->delete();
            Session::flash('status',__('alerts.Users.Delete.Delete_Alert',['name'=>$user->name]));
            return response()->json([
                "status"=>'succes',
            ]);
        }catch (\Exception $e){
            Session::flash('status',__('alerts.Users.Delete.Delete_Error'));
            Session::flash('error',true);
            return response()->json([
                "status"=>'error',
                "message"=>'error',
            ])->setStatusCode(500);
        }

    }
}
