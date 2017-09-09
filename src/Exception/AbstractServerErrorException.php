<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

use Narrowspark\HttpStatus\Contract\Exception\HttpException as HttpExceptionContract;
use RuntimeException as BaseRuntimeException;
use Throwable;

abstract class AbstractServerErrorException extends BaseRuntimeException implements HttpExceptionContract
{
    /**
     * @var string
     */
    protected $message = 'Server Error 5xx';

    /**
     * @var int
     */
    protected $statusCode = 5;

    /**
     * @var array
     */
    private $headers;

    /**
     * @param \Throwable|null $previous
     * @param array           $headers
     * @param int             $code
     */
    public function __construct(Throwable $previous = null, array $headers = [], int $code = 0)
    {
        $this->headers = $headers;

        parent::__construct($this->message, $code, $previous);
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Set response headers.
     *
     * @param array $headers Response headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }
}
