<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

public function render($request, Throwable $exception)
{
    // Cek apakah ini exception HTTP (seperti 404, 403, dll)
    if ($exception instanceof HttpExceptionInterface) {
        if ($exception->getStatusCode() == 404) {
            return response()->view('landing.404', [], 404);
        }
    }

    // Untuk exception biasa tapi ingin tetap tampilkan halaman 404
    if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
        return response()->view('landing.404', [], 404);
    }

    return parent::render($request, $exception);
}

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
