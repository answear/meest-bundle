<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response\DTO;

class CityDTO
{
    public string $cityIdRef;

    public string $descriptionUA;

    public ?string $descriptionRU = null;

    public ?string $descriptionEN = null;

    public string $regionDescriptionUA;

    public ?string $regionDescriptionRU = null;

    public ?string $regionDescriptionEN = null;

    public string $districtDescriptionUA;

    public ?string $districtDescriptionRU = null;

    public ?string $districtDescriptionEN = null;
}
