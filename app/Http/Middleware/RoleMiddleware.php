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
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        $user = auth()->user();
        $roleArray = explode(',', $roles);
        $authorized = false;

        foreach ($roleArray as $role) {
            $authorized = match (trim($role)) {
                'owner' => $user->isOwner(),
                'admin' => $user->isAdmin(),
                'editor' => $user->isEditor(),
                'moderator' => $user->isModerator(),
                default => false,
            };

            if ($authorized) break;
        }

        if (!$authorized) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
