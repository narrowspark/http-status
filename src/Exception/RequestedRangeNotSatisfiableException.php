<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class RequestedRangeNotSatisfiableException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '416 Range Not Satisfiable';

    /**
     * @var int
     */
    protected $code = 416;
}
