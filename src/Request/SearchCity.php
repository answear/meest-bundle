<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Request;

use Answear\MeestBundle\Enum\RequestEnum;

readonly class SearchCity implements RequestInterface
{
    public function __construct(private string $cityName)
    {
    }

    public function getEndpoint(): RequestEnum
    {
        return RequestEnum::SearchCity;
    }

    public function toArray(): array
    {
        return [
            'arg0' => $this->cityName,
        ];
    }
}
