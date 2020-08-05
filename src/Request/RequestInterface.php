<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Request;

use Answear\MeestBundle\Enum\RequestEnum;

interface RequestInterface
{
    public function getMethod(): RequestEnum;

    public function toArray(): array;
}
