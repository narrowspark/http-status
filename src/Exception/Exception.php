<?php
namespace Narrowspark\HttpStatus\Exception;

abstract class Exception extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'HTTP Exception';
}
