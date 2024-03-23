<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserEditData
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() == null) {
            return redirect()->route('login');
        }
        if ($request->user()->role == 'Edit') {
            return $next($request);
        } else if ($request->user()->role == 'View' || $request->user()->role == NULL) {
            $currentRouteName = $request->route()->getName();
            if ($currentRouteName == 'owner.edit' || $currentRouteName == 'owner.delete' || $currentRouteName == 'owner.create') {
                return redirect()->route('owner.index');
            } else if ($currentRouteName == 'cars.edit' || $currentRouteName == 'cars.destroy' || $currentRouteName == 'cars.create') {
                return redirect()->route('cars.index');
            }
        }
        return $next($request);
    }
}
