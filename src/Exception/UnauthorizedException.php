<?php
namespace Narrowspark\HttpStatus\Exception;

class UnauthorizedException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '401 Unauthorized';

    /**
     * @var int
     */
    protected $code = 401;
}
