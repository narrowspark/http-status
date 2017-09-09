<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class BadGatewayException extends AbstractServerErrorException
{
    /**
     * @var string
     */
    protected $message = '502 Bad Gateway';

    /**
     * @var int
     */
    protected $statusCode = 502;
}
