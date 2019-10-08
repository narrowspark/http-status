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

class MethodNotAllowedException extends AbstractClientErrorException
{
    /** @var string */
    protected $message = '405 Method Not Allowed';

    /** @var int */
    protected $statusCode = 405;
}
