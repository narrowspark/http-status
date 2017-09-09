<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

use InvalidArgumentException as BaseInvalidArgumentException;
use Narrowspark\HttpStatus\Contract\Exception\Exception as ExceptionContract;

class InvalidArgumentException extends BaseInvalidArgumentException implements ExceptionContract
{
}