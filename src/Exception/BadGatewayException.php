<?php
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
    protected $code = 502;
}
