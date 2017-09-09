<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class PayloadTooLargeException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '413 Payload Too Large';

    /**
     * @var int
     */
    protected $statusCode = 413;
}
