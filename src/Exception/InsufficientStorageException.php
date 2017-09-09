<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class InsufficientStorageException extends AbstractServerErrorException
{
    /**
     * @var string
     */
    protected $message = '507 Insufficient Storage';

    /**
     * @var int
     */
    protected $statusCode = 507;
}
