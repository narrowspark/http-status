<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class UnprocessableEntityException extends AbstractClientErrorException
{
    /**
     * @var string
     */
    protected $message = '422 Unprocessable Entity';

    /**
     * @var int
     */
    protected $code = 422;
}
