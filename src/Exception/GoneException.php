<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class GoneException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '410 Gone';

    /**
     * @var int
     */
    protected $statusCode = 410;
}
