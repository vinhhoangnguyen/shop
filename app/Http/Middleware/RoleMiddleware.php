<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user_role = $request->user()->role;
        if ($user_role !== $role) {
            if ($user_role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            if($user_role === 'manager'){
                return redirect()->route('manager.dashboard');
            }
            if($user_role === 'sale'){
                return redirect()->route('sale.dashboard');
            }
            if($user_role === 'technical'){
                return redirect()->route('technical.dashboard');
            }
            if($user_role === 'vendor'){
                return redirect()->route('vendor.dashboard');
            }

            return redirect()->route('home'); // Không đúng role, chuyển sang dashboard hoặc index của frontend
        }
        return $next($request);
    }
}
