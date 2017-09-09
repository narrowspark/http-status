# Changelog

All Notable changes to `http-status` will be documented in this file
## NEXT - 2017-08-09

### Added
- fixes #23 Add header functions to exceptions
- new HttpException Interface for better exception catching
- added new getStatusCode function to get the http status code

### Deprecated
- Nothing

### Fixed
- getCode returns now the exception code and not the http status code

### Removed
- duplicated tests

### Security
- Nothing

## NEXT - 2017-02-20

### Added
- MisdirectedRequestException, the error code 421 and the status message.
- Support for [http-message-util](//github.com/php-fig/http-message-util)
- Tests against iana.org

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Support for php 5.6 and hhvm

### Security
- Nothing

## NEXT - 2016-06-22

### Added
- HttpStatus::getReasonMessage | returns the status message.

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## NEXT - 2016-06-01

### Added
- HttpStatus::getReasonPhrase | return the status text.

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing
