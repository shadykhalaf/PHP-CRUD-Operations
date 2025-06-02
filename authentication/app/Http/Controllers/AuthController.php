<?php

namespace App\Http\Controllers;

use App\Models\AuthModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register (Request $request) {
        $request -> validate([
           'name'=> 'required|string|max:255',
           'email'=> 'required|email|unique:users',
           'password'=>'required|string|min:8|confirmed',
           'role_id'=>'required|exists:roles,id'
        ]);





        $user = AuthModel::create([
            'name' => $request ->name,
            'email' => $request ->email,
            'password' =>Hash::make($request->password),
            'role_id' => $request ->role_id,
        ]);
       
        

       

        $token = $user->createToken('access_token')->plainTextToken;


        return response()->json([
           'user'=> $user,
           'token' => $token  ,201

        ]);
        }


        public function login (Request $request) {
            
            $request->validate([
                'email'=> 'required|email',
            'password'=>'required|string',


 
         ]);
      

         $user = AuthModel::where('email'  , $request ->email)->first();
         if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    
        $token = $user->createToken('access_token')->plainTextToken;
         
return response() ->json([
    'token'=>$token,
    'user' =>$user
],200);
        }


        public function logout (Request $request)   {
            $request->user()->currentAccsessToken()->delete();

            return response()->json([
                'message' => 'logged out succesfully'
            ],201);
        }

    }