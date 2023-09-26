<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast;

use ChristianBrown\MetOffice\DataPoint\DataPointApiInterface;

interface ForecastApiInterface extends DataPointApiInterface
{
    public const FRIENDLY_NAME = 'MET Office DataPoint Forecast API';
}
