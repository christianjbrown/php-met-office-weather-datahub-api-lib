<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Enums;

enum ResolutionType: string
{
    case DAILY = 'daily';
    case THREE_HOURLY = '3hourly';
}
