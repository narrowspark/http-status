<?php
namespace Narrowspark\HttpStatus\Exception;

class ImATeapotException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '418 I\'m a teapot';

    /**
     * @var int
     */
    protected $code = 418;
}
