<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Enum;

use MabeEnum\Enum;

class RequestEnum extends Enum
{
    public const SEARCH_DIVISIONS = 'searchDivisions';

    public const GET_API_VERSION = 'getApiVersion';

    public const SEARCH_CITY_BY_POST_CODE = 'searchCityByPostCode';

    public const SEARCH_CITY = 'searchCity';

    public const SEARCH_STREET_BY_NAME_AND_CITY_ID_REF = 'searchStreetByNameAndCityIdRef';

    public static function searchDivisions(): self
    {
        return static::get(static::SEARCH_DIVISIONS);
    }

    public static function getApiVersion(): self
    {
        return static::get(static::GET_API_VERSION);
    }

    public static function searchCityByPostCode(): self
    {
        return static::get(static::SEARCH_CITY_BY_POST_CODE);
    }

    public static function searchCity(): self
    {
        return static::get(static::SEARCH_CITY);
    }

    public static function searchStreetByNameAndCityIdRef(): self
    {
        return static::get(static::SEARCH_STREET_BY_NAME_AND_CITY_ID_REF);
    }
}
