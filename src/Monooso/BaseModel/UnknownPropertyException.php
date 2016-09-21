<?php namespace Monooso\BaseModel;

use RuntimeException;

class UnknownPropertyException extends RuntimeException
{
    /**
     * Constructor.
     *
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
