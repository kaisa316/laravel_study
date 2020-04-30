<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        //custom begin
        // return $this->custom_render($request,$exception);
        //custom end
        return parent::render($request, $exception);
    }

    /**
     * 自定义输出信息
     *
     * @param [type] $request
     * @param Throwable $exception
     * @return void
     */
    protected function custom_render($request, Throwable $exception) {
        $output = [
            'code'=>-1,
            'msg'=>$exception->getMessage(),
            'data'=>[],
        ] ;
        return response()->json($output,422);
    }

    /**
     * @override
     * Convert a validation exception into a JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Validation\ValidationException  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        $errors = $exception->errors();
        foreach ($errors as $key => $value) {
            $msg = $value[0];//获取第一条错误信息
        }
        $output = [
            'code'=>-1,
            'msg'=>$msg,
            'data'=>[],
        ] ;
        return response()->json($output, $exception->status);
    }
}
