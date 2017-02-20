<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class NotImplementedException extends AbstractServerErrorException
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
