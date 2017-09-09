<?php
declare(strict_types=1);
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
    protected $statusCode = 401;
}
