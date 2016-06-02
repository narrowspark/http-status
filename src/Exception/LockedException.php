<?php
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
    protected $code = 423;
}
