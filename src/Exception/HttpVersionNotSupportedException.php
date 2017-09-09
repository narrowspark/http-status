<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class HttpVersionNotSupportedException extends AbstractServerErrorException
{
    /**
     * @var string
     */
    protected $message = '505 HTTP Version Not Supported';

    /**
     * @var int
     */
    protected $statusCode = 505;
}
