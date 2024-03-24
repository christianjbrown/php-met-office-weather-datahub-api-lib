<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Enums;

enum ApiType: string
{
    case FORECAST = 'wxfcs';
    case OBSERVATION = 'wxobs';
}
