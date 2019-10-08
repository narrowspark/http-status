<?php

declare(strict_types=1);

/**
 * This file is part of Narrowspark Framework.
 *
 * (c) Daniel Bannert <d.bannert@anolilab.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Narrowspark\HttpStatus\Exception;

use InvalidArgumentException as BaseInvalidArgumentException;
use Narrowspark\HttpStatus\Contract\Exception\Exception as ExceptionContract;

class InvalidArgumentException extends BaseInvalidArgumentException implements ExceptionContract
{
}
