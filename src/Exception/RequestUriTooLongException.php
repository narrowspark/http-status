<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class RequestUriTooLongException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '414 Request-URI Too Long';

    /**
     * @var int
     */
    protected $code = 414;
}
