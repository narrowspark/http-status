<?php
namespace Narrowspark\HttpStatus\Exception;

class ServiceUnavailableException extends AbstractServerErrorException
{
    /**
     * @var string
     */
    protected $message = '503 Service Unavailable';

    /**
     * @var int
     */
    protected $code = 503;
}