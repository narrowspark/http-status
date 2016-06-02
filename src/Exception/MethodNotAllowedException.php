<?php
namespace Narrowspark\HttpStatus\Exception;

class MethodNotAllowedException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '405 Method Not Allowed';

    /**
     * @var int
     */
    protected $code = 405;
}