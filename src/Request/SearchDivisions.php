<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Request;

use Answear\MeestBundle\Enum\DivisionTypeEnum;
use Answear\MeestBundle\Enum\RequestEnum;

class SearchDivisions implements RequestInterface
{
    /**
     * @var DivisionTypeEnum|null
     */
    private $divisionType;

    /**
     * @var string|null
     */
    private $cityId;

    public function __construct(?DivisionTypeEnum $divisionType = null, ?string $cityId = null)
    {
        $this->divisionType = $divisionType;
        $this->cityId = $cityId;
    }

    public function getMethod(): RequestEnum
    {
        return RequestEnum::searchDivisions();
    }

    public function toArray(): array
    {
        return [
            'arg0' => $this->cityId,
            'arg1' => $this->divisionType ? $this->divisionType->getValue() : null,
        ];
    }
}
