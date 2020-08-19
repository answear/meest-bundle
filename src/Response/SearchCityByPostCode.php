<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Response;

use Answear\MeestBundle\Response\DTO\CityDTO;

class SearchCityByPostCode implements ResponseInterface
{
    /**
     * @var CityDTO
     */
    public $return;
}
