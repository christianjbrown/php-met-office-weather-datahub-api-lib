<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Enums;

enum DvType: string
{
    case FORECAST = 'Forecast';
    case OBSERVATION = 'Obs';
}
