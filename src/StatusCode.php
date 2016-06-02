<?php
namespace Narrowspark\HttpStatus;

use InvalidArgumentException;
use Narrowspark\HttpStatus\Exception;
use OutOfBoundsException;

class StatusCode
{
    /**
     * Allowed range for a valid HTTP status code
     */
    const MINIMUM = 100;
    const MAXIMUM = 599;

    /**
     * Array of standard HTTP status code/reason phrases.
     *
     * @var array
     */
    private static $phrases = [
        //Informational 1xx
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        //Successful 2xx
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        226 => 'IM Used',
        //Redirection 3xx
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        //Client Error 4xx
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        451 => 'Unavailable For Legal Reasons',
        //Server Error 5xx
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required',
    ];

    /**
     * Array of standard HTTP status code/reason exceptions.
     *
     * @var array
     */
    private static $phrasesExceptions = [
        400 => Exception\BadRequestException::class,
        401 => Exception\UnauthorizedException::class,
        402 => Exception\PaymentRequiredException::class,
        403 => Exception\ForbiddenException::class,
        404 => Exception\NotFoundException::class,
        405 => Exception\MethodNotAllowedException::class,
        406 => Exception\NotAcceptableException::class,
        407 => Exception\ProxyAuthenticationRequiredException::class,
        408 => Exception\RequestTimeoutException::class,
        409 => Exception\ConflictException::class,
        410 => Exception\GoneException::class,
        411 => Exception\LengthRequiredException::class,
        412 => Exception\PreconditionFailedException::class,
        413 => Exception\RequestEntityTooLargeException::class,
        414 => Exception\RequestUriTooLongException::class,
        415 => Exception\UnsupportedMediaTypeException::class,
        416 => Exception\RequestedRangeNotSatisfiableException::class,
        417 => Exception\ExpectationFailedException::class,
        418 => Exception\ImATeapotException::class,
        422 => Exception\UnprocessableEntityException::class,
        423 => Exception\LockedException::class,
        424 => Exception\FailedDependencyException::class,
        425 => Exception\FailedDependencyException::class,
        426 => Exception\UpgradeRequiredException::class,
        428 => Exception\PreconditionRequiredException::class,
        429 => Exception\TooManyRequestsException::class,
        431 => Exception\RequestHeaderFieldsTooLargeException::class,
        451 => Exception\UnavailableForLegalReasonsException::class,
        500 => Exception\InternalServerErrorException::class,
        501 => Exception\NotImplementedException::class,
        502 => Exception\BadGatewayException::class,
        503 => Exception\ServiceUnavailableException::class,
        504 => Exception\GatewayTimeoutException::class,
        505 => Exception\HttpVersionNotSupportedException::class,
        506 => Exception\VariantAlsoNegotiatesException::class,
        507 => Exception\InsufficientStorageException::class,
        508 => Exception\LoopDetectedException::class,
        510 => Exception\NotExtendedException::class,
        511 => Exception\NetworkAuthenticationRequiredException::class,
    ];

    /**
     * Get the text for a given status code.
     *
     * @param int $code http status code
     *
     * @throws InvalidArgumentException If the requested $code is not valid
     * @throws OutOfBoundsException     If the requested $code is not found
     *
     * @return string Returns text for the given status code
     */
    public static function getReasonPhrase($code)
    {
        $code = static::filterStatusCode($code);

        if (! isset(self::$phrases[$code])) {
            throw new OutOfBoundsException(sprintf('Unknown http status code: `%s`.', $code));
        }

        return self::$phrases[$code];
    }

    /**
     * Get the text for a given status code
     *
     * @param int $code http status code
     *
     * @throws InvalidArgumentException
     */
    public static function getReasonException($code)
    {
        $code = static::filterStatusCode($code);

        if (! isset(self::$phrases[$code])) {
            throw new OutOfBoundsException(sprintf('Unknown http status code: `%s`', $code));
        }

        if (isset(self::$phrasesExceptions[$code])) {
            throw new self::$phrasesExceptions[$code]();
        }
    }

    /**
     * Filter a HTTP Status code
     *
     * @param int $code
     *
     * @throws InvalidArgumentException if the HTTP status code is invalid
     *
     * @return int
     */
    protected static function filterStatusCode($code)
    {
        $code = filter_var($code, FILTER_VALIDATE_INT, ['options' => [
            'min_range' => self::MINIMUM,
            'max_range' => self::MAXIMUM,
        ]]);

        if (! $code) {
            throw new InvalidArgumentException(
                'The submitted code must be a positive integer between ' . self::MINIMUM . ' and ' . self::MAXIMUM . '.'
            );
        }

        return $code;
    }
}
