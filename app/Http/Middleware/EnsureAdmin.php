<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;


class EnsureAdmin{

public function handle(Request $request, Closure $next){
    $role = $request->header('X-ROLE');

    if (! $role || strtolower($role) !== 'admin') {
        return response()->json(['message' => 'Unauthorized. You are not authorised for this operation.'], 403);
    }

    return $next($request);
}
}