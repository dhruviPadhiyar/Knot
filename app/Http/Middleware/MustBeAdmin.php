<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // accepting the inputs from user
        $email = $request->input('email');
        $password = $request->input('password');

        // checking the email and password entered by user
        if ($email !== 'admin@test.com' || $password !== 'admin123') {
            // if not -> throw exception
            throw new HttpException(401,'Unauthorized');
            // return response()->json(['message' => 'Unauthorized'], 401); // simple way for testing
        }
        // proceed
        return $next($request);
    }
}
