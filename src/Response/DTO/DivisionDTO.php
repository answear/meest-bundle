<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response\DTO;

class DivisionDTO
{
    public string $divisionIDRRef;

    public bool $active;

    public string $descriptionUA;

    public ?string $descriptionRU;

    public ?string $regionDescriptionUA;

    public ?string $regionDescriptionRU;

    public ?string $regionDescriptionEN;

    public ?string $districtDescriptionUA;

    public ?string $districtDescriptionRU;

    public ?string $districtDescriptionEN;

    public string $cityDescriptionUA;

    public ?string $cityDescriptionRU;

    public ?string $cityDescriptionEN;

    public ?string $streetTypeUA;

    public ?string $streetDescriptionUA;

    public ?string $streetTypeRU;

    public ?string $streetDescriptionRU;

    public ?string $streetDescriptionEN;

    public ?string $house;

    public ?string $flat;

    public string $limitweight;

    public string $divisionType;

    public string $latitude;

    public string $longitude;

    public ?string $divisionCode;

    public bool $payTypeCard;

    public bool $payTypeCash;

    public bool $terminalCash;

    public string $workingHoursUa;
}
