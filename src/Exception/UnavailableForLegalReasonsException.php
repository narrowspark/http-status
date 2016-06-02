<?php
namespace Narrowspark\HttpStatus\Exception;

class UnavailableForLegalReasonsException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '451 Unavailable For Legal Reasons';

    /**
     * @var int
     */
    protected $code = 451;
}
