<h2 align="center">Http Status</h2>
<h3 align="center">A package for working with HTTP statuses.</h3>
<p align="center">
    <a href="https://github.com/narrowspark/http-status/releases"><img src="https://img.shields.io/packagist/v/narrowspark/http-status.svg?style=flat-square"></a>
    <a href="https://php.net/"><img src="https://img.shields.io/badge/php-%5E7.0.0-8892BF.svg?style=flat-square"></a>
    <a href="https://travis-ci.org/narrowspark/http-status"><img src="https://img.shields.io/travis/narrowspark/http-status/master.svg?style=flat-square"></a>
    <a href="https://scrutinizer-ci.com/g/narrowspark/http-status/code-structure"><img src="https://img.shields.io/scrutinizer/coverage/g/narrowspark/http-status.svg?style=flat-square"></a>
    <a href="https://scrutinizer-ci.com/g/narrowspark/http-status"><img src="https://img.shields.io/scrutinizer/g/narrowspark/http-status.svg?style=flat-square"></a>
    <a href="https://packagist.org/packages/narrowspark/http-status"><img src="https://img.shields.io/packagist/dt/narrowspark/http-status.svg?style=flat-square"></a>
    <a href="http://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square"></a>
</p>

Installation
------------

Via Composer

```bash
$ composer require narrowspark/http-status
```

Use
------------

``` php
use Narrowspark\HttpStatus\HttpStatus;

// get status message from code
echo HttpStatus::getReasonMessage(301); // This and all future requests should be directed to the given URI.

try {
    HttpStatus::getReasonException(301):
} catch(/Exception $e) {
    echo $e->getMessage(); // 301 Moved Permanently
    echo $e->getCode(); // 301
}
```

### Now we have support for ([http-message-util](//github.com/php-fig/http-message-util)) so you can do something like this:

``` php
use Narrowspark\HttpStatus\HttpStatus;

// get status name from code
echo HttpStatus::getReasonPhrase(HttpStatus::STATUS_MOVED_PERMANENTLY); // Moved Permanently
```

## HTTP status code classes ([from RFC7231](//tools.ietf.org/html/rfc7231#section-6))
The first digit of the status-code defines the class of response.
The last two digits do not have any categorization role. There are five values for the first digit:

Digit  |  Category  |  Meaning
------------- | -------------  | -------------
1xx | Informational | The request was received, continuing process
2xx | Successful | The request was successfully received, understood, and accepted
3xx | Redirection | Further action needs to be taken in order to complete the request
4xx | Client Error | The request contains bad syntax or cannot be fulfilled
5xx | Server Error | The server failed to fulfill an apparently valid request


## Available HTTP status codes
Code  |  Message  |  RFC
------------- | ------------- | -------------
100 | Continue | [RFC7231, Section 6.2.1]
101 | Switching Protocols | [RFC7231, Section 6.2.2]
102 | Processing | [RFC2518]
103-199 | *Unassigned* |
200 | OK | [RFC7231, Section 6.3.1]
201 | Created | [RFC7231, Section 6.3.2]
202 | Accepted | [RFC7231, Section 6.3.3]
203 | Non-Authoritative Information | [RFC7231, Section 6.3.4]
204 | No Content | [RFC7231, Section 6.3.5]
205 | Reset Content | [RFC7231, Section 6.3.6]
206 | Partial Content | [RFC7233, Section 4.1]
207 | Multi-Status | [RFC4918]
208 | Already Reported | [RFC5842]
209-225 | *Unassigned* |
226 | IM Used | [RFC3229]
227-299 | *Unassigned* |
300 | Multiple Choices | [RFC7231, Section 6.4.1]
301 | Moved Permanently | [RFC7231, Section 6.4.2]
302 | Found | [RFC7231, Section 6.4.3]
303 | See Other | [RFC7231, Section 6.4.4]
304 | Not Modified | [RFC7232, Section 4.1]
305 | Use Proxy | [RFC7231, Section 6.4.5]
306 | (Unused) | [RFC7231, Section 6.4.6]
307 | Temporary Redirect | [RFC7231, Section 6.4.7]
308 | Permanent Redirect | [RFC7538]
309-399 | *Unassigned* |
400 | Bad Request | [RFC7231, Section 6.5.1]
401 | Unauthorized | [RFC7235, Section 3.1]
402 | Payment Required | [RFC7231, Section 6.5.2]
403 | Forbidden | [RFC7231, Section 6.5.3]
404 | Not Found | [RFC7231, Section 6.5.4]
405 | Method Not Allowed | [RFC7231, Section 6.5.5]
406 | Not Acceptable | [RFC7231, Section 6.5.6]
407 | Proxy Authentication Required | [RFC7235, Section 3.2]
408 | Request Timeout | [RFC7231, Section 6.5.7]
409 | Conflict | [RFC7231, Section 6.5.8]
410 | Gone | [RFC7231, Section 6.5.9]
411 | Length Required | [RFC7231, Section 6.5.10]
412 | Precondition Failed | [RFC7232, Section 4.2]
413 | Payload Too Large | [RFC7231, Section 6.5.11]
414 | URI Too Long | [RFC7231, Section 6.5.12]
415 | Unsupported Media Type | [RFC7231, Section 6.5.13]
416 | Range Not Satisfiable | [RFC7233, Section 4.4]
417 | Expectation Failed | [RFC7231, Section 6.5.14]
418-420 | *Unassigned* |
421 | Misdirected Request | [RFC7540, Section 9.1.2]
422 | Unprocessable Entity | [RFC4918]
423 | Locked | [RFC4918]
424 | Failed Dependency | [RFC4918]
425 | *Unassigned* |
426 | Upgrade Required | [RFC7231, Section 6.5.15]
427 | *Unassigned* |
428 | Precondition Required | [RFC6585]
429 | Too Many Requests | [RFC6585]
430 | *Unassigned* |
431 | Request Header Fields Too Large | [RFC6585]
432-450 | *Unassigned* |
451	| Unavailable For Legal | [RFC7725]
452-499 | *Unassigned* |
500 | Internal Server Error | [RFC7231, Section 6.6.1]
501 | Not Implemented | [RFC7231, Section 6.6.2]
502 | Bad Gateway | [RFC7231, Section 6.6.3]
503 | Service Unavailable | [RFC7231, Section 6.6.4]
504 | Gateway Timeout | [RFC7231, Section 6.6.5]
505 | HTTP Version Not Supported | [RFC7231, Section 6.6.6]
506 | Variant Also Negotiates | [RFC2295]
507 | Insufficient Storage | [RFC4918]
508 | Loop Detected | [RFC5842]
509 | *Unassigned* |
510 | Not Extended | [RFC2774]
511 | Network Authentication Required | [RFC6585]
512-599 | *Unassigned* |

Change log
------------

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

Testing
------------

``` bash
$ vendor/bin/phpunit
```

Contributing
------------

If you would like to help take a look at the [list of issues](http://github.com/narrowspark/http-emitter/issues) and check our [Contributing](CONTRIBUTING.md) guild.

> **Note:** Please note that this project is released with a Contributor Code of Conduct. By participating in this project you agree to abide by its terms.


License
---------------

The Narrowspark http-emitter is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
