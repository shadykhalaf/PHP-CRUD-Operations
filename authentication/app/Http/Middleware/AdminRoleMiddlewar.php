<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddlewar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {



        
        $authUser = $request->user();


        // if (!$user && $user->role_id!=1) {
        //     return response()->json([
        //         'message' => 'You Are Not Authorized to complete this action'
        //     ],403);
        //     # code...;
        // }

        if (!$authUser) {
            return response()->json([
                'message' => 'You Are Not Authorized to complete this action'
            ],403);
            # code...;
        }

        if ($authUser->role_id !=1) {
            return response()->json([
                'message' => 'You Are Not Authorized to complete this action'
            ],403);
            # code...;
        }


        return $next($request);
    }
}
