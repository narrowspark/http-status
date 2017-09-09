<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class InternalServerErrorException extends AbstractServerErrorException
{
    /**
     * @var string
     */
    protected $message = '500 Internal Server Error';

    /**
     * @var int
     */
    protected $statusCode = 500;
}
