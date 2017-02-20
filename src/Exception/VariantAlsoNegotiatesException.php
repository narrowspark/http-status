<?php
declare(strict_types=1);
namespace Narrowspark\HttpStatus\Exception;

class VariantAlsoNegotiatesException extends AbstractServerErrorException
{
    /**
     * @var string
     */
    protected $message = '506 Variant Also Negotiates';

    /**
     * @var int
     */
    protected $code = 506;
}
