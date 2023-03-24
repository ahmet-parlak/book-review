<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\BookLists;
use App\Http\Requests\Api\UserCreateRequest;
use App\Http\Requests\Api\UserAuthRequest;

class AuthController extends Controller
{
    
    public function auth(UserAuthRequest $request)
    {
        
        $user = User::where('email', $request->email)->first();
        
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        return $user->createToken($request->device_name)->plainTextToken;
        
    }

    
    public function register(UserCreateRequest $request)
    {   
        $input = $request->all();
        
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        BookLists::create(['user_id' => $user->id, 'list_name' => 'read']);
        BookLists::create(['user_id' => $user->id, 'list_name' => 'to read']);
        BookLists::create(['user_id' => $user->id, 'list_name' => 'currently reading']);

        return response()->json(['status'=>'success', 'message'=>'kayıt başarılı']);
    }

}
