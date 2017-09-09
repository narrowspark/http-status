<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class ForbiddenException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '403 Forbidden';

    /**
     * @var int
     */
    protected $statusCode = 403;
}
