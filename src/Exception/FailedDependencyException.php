<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class FailedDependencyException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '424 Failed Dependency';

    /**
     * @var int
     */
    protected $statusCode = 424;
}
