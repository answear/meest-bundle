<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Request;

use Answear\MeestBundle\Enum\DivisionTypeEnum;
use Answear\MeestBundle\Enum\RequestEnum;

readonly class SearchDivisions implements RequestInterface
{
    public function __construct(
        private ?DivisionTypeEnum $divisionType = null,
        private ?string $cityId = null,
    ) {
    }

    public function getEndpoint(): RequestEnum
    {
        return RequestEnum::SearchDivisions;
    }

    public function toArray(): array
    {
        return [
            'arg0' => $this->cityId,
            'arg1' => $this->divisionType?->value,
        ];
    }
}
