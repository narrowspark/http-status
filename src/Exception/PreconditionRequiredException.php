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

class PreconditionRequiredException extends AbstractClientErrorException
{
    /** @var string */
    protected $message = '428 Precondition Required';

    /** @var int */
    protected $statusCode = 428;
}
