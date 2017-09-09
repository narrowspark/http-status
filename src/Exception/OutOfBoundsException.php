<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

use OutOfBoundsException as BaseOutOfBoundsException;
use Narrowspark\HttpStatus\Contract\Exception\Exception as ExceptionContract;

class OutOfBoundsException extends BaseOutOfBoundsException implements ExceptionContract
{
}
