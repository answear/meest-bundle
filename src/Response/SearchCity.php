<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response;

use Answear\MeestBundle\Response\DTO\CityDTO;

class SearchCity implements ResponseInterface
{
    /**
     * @var CityDTO|CityDTO[]
     */
    public $return;
}
