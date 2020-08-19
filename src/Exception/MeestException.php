<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Exception;

class MeestException extends \RuntimeException
{
    public function __construct(\SoapFault $soapFault)
    {
        parent::__construct('Meest B2B API error has occurred.', 0, $soapFault);
    }
}
