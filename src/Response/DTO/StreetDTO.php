<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response\DTO;

class StreetDTO
{
    public string $streetIdRef;

    public string $descriptionUA;

    public ?string $descriptionRU;

    public ?string $descriptionEN;

    public string $streetTypeUA;

    public ?string $streetTypeRU;

    public string $cityIdRef;
}
