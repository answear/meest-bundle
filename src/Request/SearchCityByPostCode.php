<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Request;

use Answear\MeestBundle\Enum\RequestEnum;
use Webmozart\Assert\Assert;

readonly class SearchCityByPostCode implements RequestInterface
{
    public function __construct(public string $postCode)
    {
        Assert::length($postCode, 5);
        Assert::digits($postCode);
    }

    public function getEndpoint(): RequestEnum
    {
        return RequestEnum::SearchCityByPostCode;
    }

    public function toArray(): array
    {
        return [
            'arg0' => $this->postCode,
        ];
    }
}
