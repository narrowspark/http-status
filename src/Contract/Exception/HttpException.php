<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Contract\Exception;

interface HttpException extends Exception
{
    /**
     * Returns the status code.
     *
     * @return int An HTTP response status code
     */
    public function getStatusCode(): int;

    /**
     * Returns response headers.
     *
     * @return array Response headers
     */
    public function getHeaders(): array;
}