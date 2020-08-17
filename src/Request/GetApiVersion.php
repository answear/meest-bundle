<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Request;

use Answear\MeestBundle\Enum\RequestEnum;

class GetApiVersion implements RequestInterface
{
    public function __construct()
    {
    }

    public function getFunction(): RequestEnum
    {
        return RequestEnum::getApiVersion();
    }

    public function toArray(): array
    {
        return [];
    }
}
