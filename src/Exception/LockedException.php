<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class LockedException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '423 Locked';

    /**
     * @var int
     */
    protected $statusCode = 423;
}
