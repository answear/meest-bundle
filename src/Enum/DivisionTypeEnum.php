<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Enum;

enum DivisionTypeEnum: string
{
    case DivisionMeestExpress = 'DIVISION';
    case CollectionPoint = 'DIVISION_PICKPOINT';
    case ParcelLocker = 'POSTSTATION';
    case NovaPoshtaPoint = 'MEEST_PARTNER_PICKUP_POINT_NP';
    case UkrPoshtaPoint = 'MEEST_PARTNER_PICKUP_POINT_UP';
    case MeestPartnerPickupPoint = 'MEEST_PARTNER_PICKUP_POINT';
}
