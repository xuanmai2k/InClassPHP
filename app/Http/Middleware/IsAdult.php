<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Carbon;

class IsAdult
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if(!Auth::check()){
            return redirect()->route('login');
         }
         $user = Auth::user();
         $now = Carbon::now();

         $dateOfBirth = Carbon::createFromFormat('Y-m-d H:i:s', $user->dob);
         $age = $now->diffInYears( $dateOfBirth);
         if($age <= 18){
            return redirect()->route('home');
         }
         return $next($request);
    }
}
