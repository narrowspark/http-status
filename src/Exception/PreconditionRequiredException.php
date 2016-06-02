<?php
namespace Narrowspark\HttpStatus\Exception;

class PreconditionRequiredException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '428 Precondition Required';

    /**
     * @var int
     */
    protected $code = 428;
}
