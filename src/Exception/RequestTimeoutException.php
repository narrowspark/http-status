<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class RequestTimeoutException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '408 Request Timeout';

    /**
     * @var int
     */
    protected $code = 408;
}
