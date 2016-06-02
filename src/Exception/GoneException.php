<?php
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
    protected $code = 410;
}
