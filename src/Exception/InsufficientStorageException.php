<?php
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
    protected $code = 507;
}
