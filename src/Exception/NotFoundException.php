<?php
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
