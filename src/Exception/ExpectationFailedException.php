<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class ExpectationFailedException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '417 Expectation Failed';

    /**
     * @var int
     */
    protected $statusCode = 417;
}
