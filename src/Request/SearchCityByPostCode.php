<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Request;

use Answear\MeestBundle\Enum\RequestEnum;
use Webmozart\Assert\Assert;

class SearchCityByPostCode implements RequestInterface
{
    /**
     * @var string
     */
    private $postCode;

    public function __construct(string $postCode)
    {
        Assert::length($postCode, 5);
        $this->postCode = $postCode;
    }

    public function getEndpoint(): RequestEnum
    {
        return RequestEnum::searchCityByPostCode();
    }

    public function toArray(): array
    {
        return [
            'arg0' => $this->postCode,
        ];
    }
}
