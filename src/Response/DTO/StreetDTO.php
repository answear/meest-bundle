<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response\DTO;

class StreetDTO
{
    public string $streetIdRef;

    public string $descriptionUA;

    public ?string $descriptionRU = null;

    public ?string $descriptionEN = null;

    public string $streetTypeUA;

    public ?string $streetTypeRU = null;

    public string $cityIdRef;
}
