<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

use Narrowspark\HttpStatus\Contract\Exception\Exception as ExceptionContract;
use OutOfBoundsException as BaseOutOfBoundsException;

class OutOfBoundsException extends BaseOutOfBoundsException implements ExceptionContract
{
}
