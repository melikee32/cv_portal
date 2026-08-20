<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    // Kullanılışı: ->middleware('role:candidate') veya ->middleware('role:employer')
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        // Giriş yapılmamışsa (normalde 'auth' middleware zaten yakalar ama garanti olsun)
        if (! $user) {
            return redirect('/login');
        }

        // Kullanıcının rolü, route'un istediği role ile uyuşmuyorsa erişimi engelle
        if ($user->role !== $role) {
            abort(403, 'Bu sayfaya erişim yetkiniz yok.');
        }

        return $next($request);
    }
}