<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class TooManyRequestsException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '429 Too Many Requests';

    /**
     * @var int
     */
    protected $code = 429;
}
