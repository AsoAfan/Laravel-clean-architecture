<?php

namespace App\Domain\Shared\Exceptions;

use RuntimeException;

abstract class DomainException extends RuntimeException
{
    protected $message;

    public function __construct($message = "Domain exception occurred")
    {
        $this->message = $message;
        parent::__construct($message);
    }


    public function getErrorMessage(): string
    {
        return $this->message;
    }
}
