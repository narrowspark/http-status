<?php
declare(strict_types=1);
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
    protected $statusCode = 402;
}
