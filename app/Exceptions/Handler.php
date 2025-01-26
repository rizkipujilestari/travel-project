<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{    
    public function render($request, Throwable $exception)
    {
        $response = parent::render($request, $exception);

        if ($response->getStatusCode() === 404) {
            $response = [
                'status'  => 404,
                'message' => 'Not found!',
                'data'    => [],
            ];
            return response()->json($response, 404);
        }

        return $response;
    }

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (UnauthorizedException $e, Request $request) {
            if ($request->is('api/*')) {
                $response = [
                    'status'  => 403,
                    'message' => 'Access Forbidden!',
                    'data'    => [],
                ];
                return response()->json($response, 403);
            }
        });
    
    }
}
