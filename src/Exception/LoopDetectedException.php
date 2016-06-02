<?php
namespace Narrowspark\HttpStatus\Exception;

class LoopDetectedException extends AbstractServerErrorException
{
    /**
     * @var string
     */
    protected $message = '508 Loop Detected';

    /**
     * @var int
     */
    protected $code = 508;
}
