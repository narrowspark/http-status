<?php
namespace Narrowspark\HttpStatus\Exception;

class NotImplementedException extends ServerErrorException
{
    /**
     * @var string
     */
    protected $message = '501 Not Implemented';

    /**
     * @var int
     */
    protected $code = 501;
}
