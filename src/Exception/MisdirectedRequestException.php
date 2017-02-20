<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class MisdirectedRequestException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '421 Misdirected Request';

    /**
     * @var int
     */
    protected $code = 421;
}
