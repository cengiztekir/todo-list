<?php

namespace App\Exceptions;


use App\Helpers\ApiResponse;
use Exception;
use Throwable;

class CustomException extends Exception
{
    protected $message;
    protected $code;
    protected ?Throwable $previous;

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 406, ?Throwable $previous = null)
    {
        $this->message = $message;
        $this->code = $code;
        $this->previous = $previous;
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request): \Illuminate\Http\JsonResponse
    {
        return ApiResponse::exception($this->code, $this->message, $this->previous);
    }


}
