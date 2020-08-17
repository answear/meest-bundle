<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Request;

use Answear\MeestBundle\Enum\RequestEnum;

interface RequestInterface
{
    public function getFunction(): RequestEnum;

    public function toArray(): array;
}
