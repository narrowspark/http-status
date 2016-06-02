<?php
namespace Narrowspark\HttpStatus\Exception;

class ForbiddenException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '403 Forbidden';

    /**
     * @var int
     */
    protected $code = 403;
}
