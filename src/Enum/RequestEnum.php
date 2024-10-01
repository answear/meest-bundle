<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Enum;

enum RequestEnum: string
{
    case SearchDivisions = 'searchDivisions';
    case GetApiVersion = 'getApiVersion';
    case SearchCityByPostCode = 'searchCityByPostCode';
    case SearchCity = 'searchCity';
    case SearchStreetByNameAndCityIdRef = 'searchStreetByNameAndCityIdRef';
}
