<?php
declare(strict_types=1);
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
    protected $statusCode = 508;
}
