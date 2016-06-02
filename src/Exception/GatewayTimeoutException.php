<?php
namespace Narrowspark\HttpStatus\Exception;

class GatewayTimeoutException extends AbstractServerErrorException
{
    /**
     * @var string
     */
    protected $message = '504 Gateway Timeout';

    /**
     * @var int
     */
    protected $code = 504;
}
