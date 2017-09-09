<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class UnsupportedMediaTypeException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '415 Unsupported Media Type';

    /**
     * @var int
     */
    protected $statusCode = 415;
}
