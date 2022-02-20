<?php

namespace M9snikfeed\PhpShikimori\Exceptions;

use Exception;
use Throwable;

class ApiRequestException extends Exception
{
    protected $code;
    protected $message;

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}