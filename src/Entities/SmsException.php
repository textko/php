<?php

namespace Textko\Entities;

use Exception;
use Throwable;

class SmsException extends Exception
{
    public function __construct(
        $message = "",
        $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}