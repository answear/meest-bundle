<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response\DTO;

class CityDTO
{
    public string $cityIdRef;

    public string $descriptionUA;

    public ?string $descriptionRU;

    public ?string $descriptionEN;

    public string $regionDescriptionUA;

    public ?string $regionDescriptionRU;

    public ?string $regionDescriptionEN;

    public string $districtDescriptionUA;

    public ?string $districtDescriptionRU;

    public ?string $districtDescriptionEN;
}
