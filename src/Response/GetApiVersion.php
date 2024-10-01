<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response;

readonly class GetApiVersion implements ResponseInterface
{
    public function __construct(public string $return)
    {
    }
}
