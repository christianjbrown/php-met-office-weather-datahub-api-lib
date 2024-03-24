<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast;

use ChristianBrown\MetOffice\DataPoint\Forecast\Model\Forecast;

interface ThreeHourlySiteForecastApiInterface extends ForecastApiInterface
{
    public const SECS_PER_3_HOURS = 60 * 60 * 3;

    public function get(int $locationId): Forecast;

    public function getOnePeriod(int $locationId, ?int $time = null): Forecast;
}
