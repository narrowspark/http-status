<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class ProxyAuthenticationRequiredException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '407 Proxy Authentication Required';

    /**
     * @var int
     */
    protected $code = 407;
}
