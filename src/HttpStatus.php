<?php
namespace Narrowspark\HttpStatus;

use InvalidArgumentException;
use Narrowspark\HttpStatus\Exception\BadGatewayException;
use Narrowspark\HttpStatus\Exception\BadRequestException;
use Narrowspark\HttpStatus\Exception\ConflictException;
use Narrowspark\HttpStatus\Exception\ExpectationFailedException;
use Narrowspark\HttpStatus\Exception\FailedDependencyException;
use Narrowspark\HttpStatus\Exception\ForbiddenException;
use Narrowspark\HttpStatus\Exception\GatewayTimeoutException;
use Narrowspark\HttpStatus\Exception\GoneException;
use Narrowspark\HttpStatus\Exception\HttpVersionNotSupportedException;
use Narrowspark\HttpStatus\Exception\ImATeapotException;
use Narrowspark\HttpStatus\Exception\InsufficientStorageException;
use Narrowspark\HttpStatus\Exception\InternalServerErrorException;
use Narrowspark\HttpStatus\Exception\LengthRequiredException;
use Narrowspark\HttpStatus\Exception\LockedException;
use Narrowspark\HttpStatus\Exception\LoopDetectedException;
use Narrowspark\HttpStatus\Exception\MethodNotAllowedException;
use Narrowspark\HttpStatus\Exception\NetworkAuthenticationRequiredException;
use Narrowspark\HttpStatus\Exception\NotAcceptableException;
use Narrowspark\HttpStatus\Exception\NotExtendedException;
use Narrowspark\HttpStatus\Exception\NotFoundException;
use Narrowspark\HttpStatus\Exception\NotImplementedException;
use Narrowspark\HttpStatus\Exception\PaymentRequiredException;
use Narrowspark\HttpStatus\Exception\PreconditionFailedException;
use Narrowspark\HttpStatus\Exception\PreconditionRequiredException;
use Narrowspark\HttpStatus\Exception\ProxyAuthenticationRequiredException;
use Narrowspark\HttpStatus\Exception\RequestedRangeNotSatisfiableException;
use Narrowspark\HttpStatus\Exception\RequestEntityTooLargeException;
use Narrowspark\HttpStatus\Exception\RequestHeaderFieldsTooLargeException;
use Narrowspark\HttpStatus\Exception\RequestTimeoutException;
use Narrowspark\HttpStatus\Exception\RequestUriTooLongException;
use Narrowspark\HttpStatus\Exception\ServiceUnavailableException;
use Narrowspark\HttpStatus\Exception\TooManyRequestsException;
use Narrowspark\HttpStatus\Exception\UnauthorizedException;
use Narrowspark\HttpStatus\Exception\UnavailableForLegalReasonsException;
use Narrowspark\HttpStatus\Exception\UnprocessableEntityException;
use Narrowspark\HttpStatus\Exception\UnsupportedMediaTypeException;
use Narrowspark\HttpStatus\Exception\UpgradeRequiredException;
use Narrowspark\HttpStatus\Exception\VariantAlsoNegotiatesException;
use OutOfBoundsException;

class HttpStatus
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
     * Private constructor; non-instantiable.
     *
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }

    /**
     * Array of standard HTTP status code/reason exceptions.
     *
     * @var array
     */
    private static $phrasesExceptions = [
        400 => BadRequestException::class,
        401 => UnauthorizedException::class,
        402 => PaymentRequiredException::class,
        403 => ForbiddenException::class,
        404 => NotFoundException::class,
        405 => MethodNotAllowedException::class,
        406 => NotAcceptableException::class,
        407 => ProxyAuthenticationRequiredException::class,
        408 => RequestTimeoutException::class,
        409 => ConflictException::class,
        410 => GoneException::class,
        411 => LengthRequiredException::class,
        412 => PreconditionFailedException::class,
        413 => RequestEntityTooLargeException::class,
        414 => RequestUriTooLongException::class,
        415 => UnsupportedMediaTypeException::class,
        416 => RequestedRangeNotSatisfiableException::class,
        417 => ExpectationFailedException::class,
        418 => ImATeapotException::class,
        422 => UnprocessableEntityException::class,
        423 => LockedException::class,
        424 => FailedDependencyException::class,
        426 => UpgradeRequiredException::class,
        428 => PreconditionRequiredException::class,
        429 => TooManyRequestsException::class,
        431 => RequestHeaderFieldsTooLargeException::class,
        451 => UnavailableForLegalReasonsException::class,
        500 => InternalServerErrorException::class,
        501 => NotImplementedException::class,
        502 => BadGatewayException::class,
        503 => ServiceUnavailableException::class,
        504 => GatewayTimeoutException::class,
        505 => HttpVersionNotSupportedException::class,
        506 => VariantAlsoNegotiatesException::class,
        507 => InsufficientStorageException::class,
        508 => LoopDetectedException::class,
        510 => NotExtendedException::class,
        511 => NetworkAuthenticationRequiredException::class,
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
    public static function filterStatusCode($code)
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
