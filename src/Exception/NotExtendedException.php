<?php
namespace Narrowspark\HttpStatus\Exception;

class NotExtendedException extends AbstractServerErrorException
{
    /**
     * @var string
     */
    protected $message = '510 Not Extended';

    /**
     * @var int
     */
    protected $code = 510;
}