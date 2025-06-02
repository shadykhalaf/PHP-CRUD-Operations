<?php

namespace App\Http\Controllers;

use App\Models\RolesModel;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function store (Request $request) {

     $request -> validate([
        'role_name'=> 'string|required|max:100'
     ]);

     $role = RolesModel::create([
        'role_name' => $request->role_name
     ]);

     return response()->json([
        
        'message'=> 'created succssesfully'
     ],201);

    }
}
