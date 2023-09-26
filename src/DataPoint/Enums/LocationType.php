<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Enums;

enum LocationType: string
{
    case ALL = 'all';
    case MOUNTAIN_AREA = 'mountainarea';
    case NATIONAL_PARK = 'nationalpark';
    case REGIONAL_FORECAST = 'regionalforecast';
    case UK_EXTREMES = 'ukextremes';
}
