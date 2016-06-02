<?php
namespace Narrowspark\HttpStatus\Exception;

class PaymentRequiredException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '402 Payment Required';

    /**
     * @var int
     */
    protected $code = 402;
}
