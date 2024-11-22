<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response\DTO;

class DivisionDTO
{
    public string $divisionIDRRef;

    public bool $active;

    public string $descriptionUA;

    public ?string $descriptionRU = null;

    public ?string $regionDescriptionUA = null;

    public ?string $regionDescriptionRU = null;

    public ?string $regionDescriptionEN = null;

    public ?string $districtDescriptionUA = null;

    public ?string $districtDescriptionRU = null;

    public ?string $districtDescriptionEN = null;

    public string $cityDescriptionUA;

    public ?string $cityDescriptionRU = null;

    public ?string $cityDescriptionEN = null;

    public ?string $streetTypeUA = null;

    public ?string $streetDescriptionUA = null;

    public ?string $streetTypeRU = null;

    public ?string $streetDescriptionRU = null;

    public ?string $streetDescriptionEN = null;

    public ?string $house = null;

    public ?string $flat = null;

    public string $limitweight;

    public string $divisionType;

    public string $latitude;

    public string $longitude;

    public ?string $divisionCode = null;

    public bool $payTypeCard;

    public bool $payTypeCash;

    public bool $terminalCash;

    public ?string $workingHoursUa = null;
}
