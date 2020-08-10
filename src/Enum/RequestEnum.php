<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Enum;

use MabeEnum\Enum;

class RequestEnum extends Enum
{
    public const SEARCH_DIVISIONS = 'searchDivisions';

    public static function searchDivisions(): self
    {
        return static::get(static::SEARCH_DIVISIONS);
    }
}
