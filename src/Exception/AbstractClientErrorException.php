<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

abstract class AbstractClientErrorException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Client Error 4xx';

    /**
     * @var int
     */
    protected $code = 4;
}
