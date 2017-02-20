<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class NotFoundException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '404 Not Found';

    /**
     * @var int
     */
    protected $code = 404;
}
