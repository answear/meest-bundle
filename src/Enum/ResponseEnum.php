<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Enum;

class ResponseEnum
{
    public const SEARCH_DIVISIONS = 'searchDivisionsResponse';
    public const GET_API_VERSION = 'getApiVersionResponse';
    public const SEARCH_CITY_BY_POST_CODE = 'searchCityByPostCodeResponse';
    public const SEARCH_CITY = 'searchCityResponse';
    public const SEARCH_STREET_BY_NAME_AND_CITY_ID_REF = 'searchStreetByNameAndCityIdRefResponse';
    // inner DTOs
    public const DIVISION_DTO = 'divisionApiBean';
    public const CITY_DTO = 'cityApiBean';
    public const STREET_DTO = 'streetApiBean';
}
