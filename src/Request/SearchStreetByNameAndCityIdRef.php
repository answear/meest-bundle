<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Request;

use Answear\MeestBundle\Enum\RequestEnum;

class SearchStreetByNameAndCityIdRef implements RequestInterface
{
    /**
     * @var string
     */
    private $cityId;

    /**
     * @var string
     */
    private $streetName;

    public function __construct(string $cityId, string $streetName)
    {
        $this->cityId = $cityId;
        $this->streetName = $streetName;
    }

    public function getEndpoint(): RequestEnum
    {
        return RequestEnum::searchStreetByNameAndCityIdRef();
    }

    public function toArray(): array
    {
        return [
            'arg0' => $this->cityId,
            'arg1' => $this->streetName,
        ];
    }
}
