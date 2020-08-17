<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Request;

use Answear\MeestBundle\Enum\RequestEnum;

class SearchCity implements RequestInterface
{
    /**
     * @var string
     */
    private $cityName;

    public function __construct(string $cityName)
    {
        $this->cityName = $cityName;
    }

    public function getFunction(): RequestEnum
    {
        return RequestEnum::searchCity();
    }

    public function toArray(): array
    {
        return [
            'arg0' => $this->cityName,
        ];
    }
}
