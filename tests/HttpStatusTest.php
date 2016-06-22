<?php
namespace Narrowspark\HttpStatus\Tests;

use Narrowspark\HttpStatus\HttpStatus;
use Narrowspark\HttpStatus\Exception;

class HttpStatusTest extends \PHPUnit_Framework_TestCase
{
    private $errorNames = [
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

    private $errorPhrases = [
        400 => 'The request cannot be fulfilled due to bad syntax.',
        401 => 'Authentication is required and has failed or has not yet been provided.',
        402 => '',
        403 => 'The request was a valid request, but the server is refusing to respond to it.',
        404 => 'The requested resource could not be found but may be available again in the future.',
        405 => 'A request was made of a resource using a request method not supported by that resource.',
        406 => 'The requested resource is only capable of generating content not acceptable.',
        407 => '',
        408 => 'The server did not receive a complete request message in time.',
        409 => 'The request could not be processed because of conflict in the request.',
        410 => 'The requested resource is no longer available and will not be available again.',
        411 => 'The request did not specify the length of its content, which is required by the resource.',
        412 => 'The server does not meet one of the preconditions that the requester put on the request.',
        413 => 'The server cannot process the request because the request payload is too large.',
        414 => 'The request-target is longer than the server is willing to interpret.',
        415 => 'The request entity has a media type which the server or resource does not support.',
        416 => '',
        417 => 'The expectation given could not be met by at least one of the inbound servers.',
        418 => '',
        422 => 'The request was well-formed but was unable to be followed due to semantic errors.',
        423 => '',
        424 => '',
        426 => 'The server cannot process the request using the current protocol.',
        428 => 'The origin server requires the request to be conditional.',
        429 => 'The user has sent too many requests in a given amount of time.',
        431 => '',
        451 => '',
        500 => 'An error has occurred and this resource cannot be displayed.',
        501 => 'The server either does not recognize the request method, or it lacks the ability to fulfil the request.',
        502 => 'The server was acting as a gateway or proxy and received an invalid response from the upstream server.',
        503 => 'The server is currently unavailable. It may be overloaded or down for maintenance.',
        504 => 'The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.',
        505 => 'The server does not support the HTTP protocol version used in the request.',
        506 => '',
        507 => '',
        508 => '',
        510 => '',
        511 => '',
    ];

    private $phrasesExceptions = [
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
        426 => Exception\UpgradeRequiredException::class,
        428 => Exception\PreconditionRequiredException::class,
        429 => Exception\TooManyRequestsException::class,
        431 => Exception\RequestHeaderFieldsTooLargeException::class,
        451 => Exception\UnavailableForLegalReasonsException::class,
        //Server Error 5xx
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

    public function testGetReasonName()
    {
        foreach ($this->errorNames as $code => $text) {
            $this->assertSame(
                $text,
                HttpStatus::getReasonName($code),
                'Expected HttpStatus::getReasonName(' . $code . ') to return ' . $text
            );
        }
    }

    public function testGetReasonPhrase()
    {
        foreach ($this->errorPhrases as $code => $text) {
            $this->assertSame(
                $text,
                HttpStatus::getReasonPhrase($code),
                'Expected HttpStatus::getReasonName(' . $code . ') to return ' . $text
            );
        }
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The submitted code must be a positive integer between 100 and 599.
     */
    public function testGetReasonNameToThrowInvalidArgumentException()
    {
        HttpStatus::getReasonName(700);
    }

    /**
     * @expectedException OutOfBoundsException
     * @expectedExceptionMessage Unknown http status code: `509`.
     */
    public function testGetReasonNameToThrowOutOfBoundsException()
    {
        HttpStatus::getReasonName(509);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The submitted code must be a positive integer between 100 and 599.
     */
    public function testGetReasonPhraseToThrowInvalidArgumentException()
    {
        HttpStatus::getReasonPhrase(700);
    }

    /**
     * @expectedException OutOfBoundsException
     * @expectedExceptionMessage Unknown http status code: `509`.
     */
    public function testGetReasonPhraseToThrowOutOfBoundsException()
    {
        HttpStatus::getReasonPhrase(509);
    }

    public function testGetReasonException()
    {
        foreach ($this->errorNames as $code => $text) {
            try {
                HttpStatus::getReasonException($code);
            } catch (\Exception $exception) {
                $this->assertSame(
                    $code . ' ' . $text,
                    $exception->getMessage(),
                    'Expected HttpStatus::getReasonException(' . $code . ') to return ' . $text
                );

                $this->assertSame(
                    $code,
                    $exception->getCode(),
                    'Expected HttpStatus::getReasonException(' . $code . ') to return ' . $text
                );
            }
        }
    }

    public function testIfAllExceptionsAreExtendetFromTheRightClient()
    {
        $clientCount = 0;
        $serverCount = 0;

        foreach ($this->errorNames as $code => $text) {
            try {
                HttpStatus::getReasonException($code);
            } catch (Exception\AbstractClientErrorException $client) {
                ++$clientCount;
            } catch (Exception\AbstractServerErrorException $server) {
                ++$serverCount;
            }
        }

        $this->assertSame(27, $clientCount);
        $this->assertSame(11, $serverCount);
    }
}
