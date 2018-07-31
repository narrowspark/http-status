<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class TooEarlyException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '425 Too Early';

    /**
     * @var int
     */
    protected $statusCode = 425;
}
