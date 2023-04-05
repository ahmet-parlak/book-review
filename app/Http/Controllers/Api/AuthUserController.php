<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Actions\Fortify\UpdateUserPassword;

class AuthUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new UserResource(auth()->user());
        return response(["user"=>$user]);
    }

    
    public function update(Request $request)
    {
       $updateUserObj =  new UpdateUserProfileInformation();
       $updateUserObj->update(auth()->user(),$request->all());
       return response(['message'=>'success']);
    }

    public function passwordUpdate(Request $request)
    {
       $updateUserPassObj =  new UpdateUserPassword();
       $updateUserPassObj->update(auth()->user(),$request->all());
       return response(['message'=>'success']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
