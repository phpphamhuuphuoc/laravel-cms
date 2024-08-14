<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// return Application::configure(basePath: dirname(__DIR__))
//     ->withRouting(
//         web: __DIR__.'/../routes/web.php',
//         commands: __DIR__.'/../routes/console.php',
//         health: '/up',
//     )
//     ->withMiddleware(function (Middleware $middleware) {
//         // Đăng ký middleware tùy chỉnh nếu cần
//         $middleware->add('auth:sanctum', \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class);
//         $middleware->add('throttle', \Illuminate\Routing\Middleware\ThrottleRequests::class);
//         $middleware->add('bindings', \Illuminate\Routing\Middleware\SubstituteBindings::class);
//     })
//     ->withExceptions(function (Exceptions $exceptions) {
//         // Cấu hình xử lý ngoại lệ nếu cần
//     })
//     ->create();
