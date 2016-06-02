<?php
namespace Narrowspark\HttpStatus\Exception;

class LengthRequiredException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '411 Length Required';

    /**
     * @var int
     */
    protected $code = 411;
}
