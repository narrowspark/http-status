<?php
namespace Narrowspark\HttpStatus\Exception;

class ConflictException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '409 Conflict';

    /**
     * @var int
     */
    protected $code = 409;
}
