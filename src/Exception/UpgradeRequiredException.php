<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class UpgradeRequiredException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '426 Upgrade Required';

    /**
     * @var int
     */
    protected $statusCode = 426;
}
