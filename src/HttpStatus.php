<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus;

use Fig\Http\Message\StatusCodeInterface;
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
use Narrowspark\HttpStatus\Exception\InvalidArgumentException;
use Narrowspark\HttpStatus\Exception\LengthRequiredException;
use Narrowspark\HttpStatus\Exception\LockedException;
use Narrowspark\HttpStatus\Exception\LoopDetectedException;
use Narrowspark\HttpStatus\Exception\MethodNotAllowedException;
use Narrowspark\HttpStatus\Exception\MisdirectedRequestException;
use Narrowspark\HttpStatus\Exception\NetworkAuthenticationRequiredException;
use Narrowspark\HttpStatus\Exception\NotAcceptableException;
use Narrowspark\HttpStatus\Exception\NotExtendedException;
use Narrowspark\HttpStatus\Exception\NotFoundException;
use Narrowspark\HttpStatus\Exception\NotImplementedException;
use Narrowspark\HttpStatus\Exception\OutOfBoundsException;
use Narrowspark\HttpStatus\Exception\PayloadTooLargeException;
use Narrowspark\HttpStatus\Exception\PaymentRequiredException;
use Narrowspark\HttpStatus\Exception\PreconditionFailedException;
use Narrowspark\HttpStatus\Exception\PreconditionRequiredException;
use Narrowspark\HttpStatus\Exception\ProxyAuthenticationRequiredException;
use Narrowspark\HttpStatus\Exception\RequestedRangeNotSatisfiableException;
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

class HttpStatus implements StatusCodeInterface
{
    /**
     * Allowed range for a valid HTTP status code.
     */
    const MINIMUM = 100;
    const MAXIMUM = 599;

    /**
     * Array of standard HTTP status code/reason phrases.
     *
     * @var array
     */
    private static $statusNames = [
        // Informational 1xx
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        // Successful 2xx
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
        // Redirection 3xx
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        // Client Error 4xx
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
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        421 => 'Misdirected Request',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        451 => 'Unavailable For Legal Reasons',
        // Server Error 5xx
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
     * Array of standard HTTP status code/reason phrases.
     *
     * @var array
     */
    private static $errorPhrases = [
        // Successful 2xx
        200 => 'Standard response for successful HTTP requests.',
        201 => 'The request has been fulfilled, resulting in the creation of a new resource.',
        202 => 'The request has been accepted for processing, but the processing has not been completed.',
        203 => 'The server is a transforming proxy (e.g. a Web accelerator) that received a 200 OK from its origin, but is returning a modified version of the origin\'s response.',
        204 => 'The server successfully processed the request and is not returning any content.',
        205 => 'The server successfully processed the request, but is not returning any content.',
        206 => 'The server is delivering only part of the resource (byte serving) due to a range header sent by the client.',
        207 => 'The message body that follows is an XML message and can contain a number of separate response codes, depending on how many sub-requests were made.',
        208 => 'The members of a DAV binding have already been enumerated in a previous reply to this request, and are not being included again.',
        226 => 'The server has fulfilled a request for the resource, and the response is a representation of the result of one or more instance-manipulations applied to the current instance.',
        // Redirection 3xx
        300 => 'Indicates multiple options for the resource from which the client may choose.',
        301 => 'This and all future requests should be directed to the given URI.',
        302 => 'This is an example of industry practice contradicting the standard.',
        303 => 'The response to the request can be found under another URI using a GET method.',
        304 => 'Indicates that the resource has not been modified since the version specified by the request headers If-Modified-Since or If-None-Match.',
        305 => 'The requested resource is available only through a proxy, the address for which is provided in the response.',
        306 => 'No longer used.',
        307 => 'In this case, the request should be repeated with another URI; however, future requests should still use the original URI.',
        308 => 'The request and all future requests should be repeated using another URI.',
        // Client Error 4xx
        400 => 'The request cannot be fulfilled due to bad syntax.',
        401 => 'Authentication is required and has failed or has not yet been provided.',
        402 => 'Reserved for future use.',
        403 => 'The request was a valid request, but the server is refusing to respond to it.',
        404 => 'The requested resource could not be found but may be available again in the future.',
        405 => 'A request was made of a resource using a request method not supported by that resource.',
        406 => 'The requested resource is only capable of generating content not acceptable.',
        407 => 'Proxy authentication is required to access the requested resource.',
        408 => 'The server did not receive a complete request message in time.',
        409 => 'The request could not be processed because of conflict in the request.',
        410 => 'The requested resource is no longer available and will not be available again.',
        411 => 'The request did not specify the length of its content, which is required by the resource.',
        412 => 'The server does not meet one of the preconditions that the requester put on the request.',
        413 => 'The server cannot process the request because the request payload is too large.',
        414 => 'The request-target is longer than the server is willing to interpret.',
        415 => 'The request entity has a media type which the server or resource does not support.',
        416 => 'The client has asked for a portion of the file, but the server cannot supply that portion.',
        417 => 'The expectation given could not be met by at least one of the inbound servers.',
        418 => 'I\'m a teapot',
        421 => 'The request was directed at a server that is not able to produce a response.',
        422 => 'The request was well-formed but was unable to be followed due to semantic errors.',
        423 => 'The resource that is being accessed is locked.',
        424 => 'The request failed due to failure of a previous request.',
        426 => 'The server cannot process the request using the current protocol.',
        428 => 'The origin server requires the request to be conditional.',
        429 => 'The user has sent too many requests in a given amount of time.',
        431 => 'The server is unwilling to process the request because either an individual header field, or all the header fields collectively, are too large.',
        451 => 'Resource access is denied for legal reasons.',
        // Server Error 5xx
        500 => 'An error has occurred and this resource cannot be displayed.',
        501 => 'The server either does not recognize the request method, or it lacks the ability to fulfil the request.',
        502 => 'The server was acting as a gateway or proxy and received an invalid response from the upstream server.',
        503 => 'The server is currently unavailable. It may be overloaded or down for maintenance.',
        504 => 'The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.',
        505 => 'The server does not support the HTTP protocol version used in the request.',
        506 => 'Transparent content negotiation for the request, results in a circular reference.',
        507 => 'The method could not be performed on the resource because the server is unable to store the representation needed to successfully complete the request. There is insufficient free space left in your storage allocation.',
        508 => 'The server detected an infinite loop while processing the request.',
        510 => 'Further extensions to the request are required for the server to fulfill it.A mandatory extension policy in the request is not accepted by the server for this resource.',
        511 => 'The client needs to authenticate to gain network access.',
    ];

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
        413 => PayloadTooLargeException::class,
        414 => RequestUriTooLongException::class,
        415 => UnsupportedMediaTypeException::class,
        416 => RequestedRangeNotSatisfiableException::class,
        417 => ExpectationFailedException::class,
        418 => ImATeapotException::class,
        421 => MisdirectedRequestException::class,
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
     * Private constructor; non-instantiable.
     *
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }

    /**
     * Get the message for a given status code.
     *
     * @param int $code http status code
     *
     * @throws \Narrowspark\HttpStatus\Exception\InvalidArgumentException If the requested $code is not valid
     * @throws \Narrowspark\HttpStatus\Exception\OutOfBoundsException     If the requested $code is not found
     *
     * @return string Returns message for the given status code
     */
    public static function getReasonMessage(int $code): string
    {
        $code = static::filterStatusCode($code);

        if (! isset(self::$errorPhrases[$code])) {
            throw new OutOfBoundsException(sprintf('Unknown http status code: `%s`.', $code));
        }

        return self::$errorPhrases[$code];
    }

    /**
     * Get the name for a given status code.
     *
     * @param int $code http status code
     *
     * @throws \Narrowspark\HttpStatus\Exception\InvalidArgumentException If the requested $code is not valid
     * @throws \Narrowspark\HttpStatus\Exception\OutOfBoundsException     If the requested $code is not found
     *
     * @return string Returns name for the given status code
     */
    public static function getReasonPhrase(int $code): string
    {
        $code = static::filterStatusCode($code);

        if (! isset(self::$statusNames[$code])) {
            throw new OutOfBoundsException(sprintf('Unknown http status code: `%s`.', $code));
        }

        return self::$statusNames[$code];
    }

    /**
     * Get the text for a given status code.
     *
     * @param int $code http status code
     *
     * @throws \Narrowspark\HttpStatus\Exception\InvalidArgumentException
     * @throws \Narrowspark\HttpStatus\Exception\BadGatewayException
     * @throws \Narrowspark\HttpStatus\Exception\BadRequestException
     * @throws \Narrowspark\HttpStatus\Exception\ConflictException
     * @throws \Narrowspark\HttpStatus\Exception\ExpectationFailedException
     * @throws \Narrowspark\HttpStatus\Exception\FailedDependencyException
     * @throws \Narrowspark\HttpStatus\Exception\ForbiddenException
     * @throws \Narrowspark\HttpStatus\Exception\GatewayTimeoutException
     * @throws \Narrowspark\HttpStatus\Exception\GoneException
     * @throws \Narrowspark\HttpStatus\Exception\HttpVersionNotSupportedException
     * @throws \Narrowspark\HttpStatus\Exception\ImATeapotException
     * @throws \Narrowspark\HttpStatus\Exception\InsufficientStorageException
     * @throws \Narrowspark\HttpStatus\Exception\InternalServerErrorException
     * @throws \Narrowspark\HttpStatus\Exception\LengthRequiredException
     * @throws \Narrowspark\HttpStatus\Exception\LockedException
     * @throws \Narrowspark\HttpStatus\Exception\LoopDetectedException
     * @throws \Narrowspark\HttpStatus\Exception\MethodNotAllowedException
     * @throws \Narrowspark\HttpStatus\Exception\NetworkAuthenticationRequiredException
     * @throws \Narrowspark\HttpStatus\Exception\NotAcceptableException
     * @throws \Narrowspark\HttpStatus\Exception\NotExtendedException
     * @throws \Narrowspark\HttpStatus\Exception\NotFoundException
     * @throws \Narrowspark\HttpStatus\Exception\NotImplementedException
     * @throws \Narrowspark\HttpStatus\Exception\PaymentRequiredException
     * @throws \Narrowspark\HttpStatus\Exception\PreconditionFailedException
     * @throws \Narrowspark\HttpStatus\Exception\PreconditionRequiredException
     * @throws \Narrowspark\HttpStatus\Exception\ProxyAuthenticationRequiredException
     * @throws \Narrowspark\HttpStatus\Exception\RequestedRangeNotSatisfiableException
     * @throws \Narrowspark\HttpStatus\Exception\RequestEntityTooLargeException
     * @throws \Narrowspark\HttpStatus\Exception\RequestHeaderFieldsTooLargeException
     * @throws \Narrowspark\HttpStatus\Exception\RequestTimeoutException
     * @throws \Narrowspark\HttpStatus\Exception\RequestUriTooLongException
     * @throws \Narrowspark\HttpStatus\Exception\ServiceUnavailableException
     * @throws \Narrowspark\HttpStatus\Exception\TooManyRequestsException
     * @throws \Narrowspark\HttpStatus\Exception\UnauthorizedException
     * @throws \Narrowspark\HttpStatus\Exception\UnavailableForLegalReasonsException
     * @throws \Narrowspark\HttpStatus\Exception\UnprocessableEntityException
     * @throws \Narrowspark\HttpStatus\Exception\UnsupportedMediaTypeException
     * @throws \Narrowspark\HttpStatus\Exception\UpgradeRequiredException
     * @throws \Narrowspark\HttpStatus\Exception\VariantAlsoNegotiatesException
     * @throws \Narrowspark\HttpStatus\Exception\OutOfBoundsException
     */
    public static function getReasonException(int $code)
    {
        $code = static::filterStatusCode($code);

        if (! isset(self::$statusNames[$code])) {
            throw new OutOfBoundsException(sprintf('Unknown http status code: `%s`', $code));
        }

        if (isset(self::$phrasesExceptions[$code])) {
            throw new self::$phrasesExceptions[$code]();
        }
    }

    /**
     * Filter a HTTP Status code.
     *
     * @param int $code
     *
     * @throws \Narrowspark\HttpStatus\Exception\InvalidArgumentException if the HTTP status code is invalid
     *
     * @return int
     */
    public static function filterStatusCode(int $code): int
    {
        $filteredCode = filter_var($code, FILTER_VALIDATE_INT, ['options' => [
            'min_range' => self::MINIMUM,
            'max_range' => self::MAXIMUM,
        ]]);

        if (! $filteredCode) {
            throw new InvalidArgumentException(sprintf(
                'The submitted code "%s" must be a positive integer between %s and %s.',
                $code,
                self::MINIMUM,
                self::MAXIMUM
            ));
        }

        return $code;
    }
}
