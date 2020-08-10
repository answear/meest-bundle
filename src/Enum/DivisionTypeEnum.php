<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Enum;

use MabeEnum\Enum;

class DivisionTypeEnum extends Enum
{
    public const DIVISION_MEEST_EXPRESS = 'DIVISION';
    public const COLLECTION_POINT = 'DIVISION_PICKPOINT';
    public const PARCEL_LOCKER = 'POSTSTATION';
    public const NOVA_POSHTA_POINT = 'MEEST_PARTNER_PICKUP_POINT_NP';
    public const UKR_POSHTA_POINT = 'MEEST_PARTNER_PICKUP_POINT_UP';
    public const MEEST_PARTNER_PICKUP_POINT = 'MEEST_PARTNER_PICKUP_POINT';

    public static function divisionMeestExpress(): self
    {
        return static::get(static::DIVISION_MEEST_EXPRESS);
    }

    public static function collectionPoint(): self
    {
        return static::get(static::COLLECTION_POINT);
    }

    public static function parcelLocker(): self
    {
        return static::get(static::PARCEL_LOCKER);
    }

    public static function novaPoshtaPoint(): self
    {
        return static::get(static::NOVA_POSHTA_POINT);
    }

    public static function ukrPoshtaPoint(): self
    {
        return static::get(static::UKR_POSHTA_POINT);
    }

    public static function meestPartnerPickupPoint(): self
    {
        return static::get(static::MEEST_PARTNER_PICKUP_POINT);
    }
}
