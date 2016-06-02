<?php
namespace Narrowspark\HttpStatus\Exception;

class RequestHeaderFieldsTooLargeException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '431 Request Header Fields Too Large';

    /**
     * @var int
     */
    protected $code = 431;
}
