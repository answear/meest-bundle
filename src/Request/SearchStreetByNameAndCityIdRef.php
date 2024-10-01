<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Request;

use Answear\MeestBundle\Enum\RequestEnum;

readonly class SearchStreetByNameAndCityIdRef implements RequestInterface
{
    public function __construct(
        private string $cityId,
        private string $streetName,
    ) {
    }

    public function getEndpoint(): RequestEnum
    {
        return RequestEnum::SearchStreetByNameAndCityIdRef;
    }

    public function toArray(): array
    {
        return [
            'arg0' => $this->cityId,
            'arg1' => $this->streetName,
        ];
    }
}
