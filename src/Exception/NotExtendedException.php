<?php
declare(strict_types=1);
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
    protected $statusCode = 510;
}
