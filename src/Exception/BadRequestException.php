<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class BadRequestException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '400 Bad Request';

    /**
     * @var int
     */
    protected $statusCode = 400;
}
