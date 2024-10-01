<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response;

use Answear\MeestBundle\Response\DTO\StreetDTO;

class SearchStreetByNameAndCityIdRef implements ResponseInterface
{
    /**
     * @var StreetDTO[]
     */
    public array $return;
}
