<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

abstract class AbstractServerErrorException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Server Error 5xx';

    /**
     * @var int
     */
    protected $code = 5;
}
