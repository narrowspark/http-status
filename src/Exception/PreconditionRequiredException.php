<?php
declare(strict_types=1);
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
    protected $statusCode = 428;
}
