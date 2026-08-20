<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    // Middleware ayarları
    ->withMiddleware(function (Middleware $middleware): void {
        
        // Kullanıcı rollerini kontrol etmek için role middleware'i
        $middleware->alias([
            'role' => \App\Http\Middleware\EnsureUserRole::class,
        ]);

        
    })

    // Hata yönetimi
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })

    // Laravel uygulamasını oluştur
    ->create();