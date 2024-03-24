<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast;

use ChristianBrown\MetOffice\DataPoint\Forecast\Model\Forecast;

interface DailySiteForecastApiInterface extends ForecastApiInterface
{
    public function get(int $locationId): Forecast;

    public function getOnePeriod(int $locationId, ?int $time = null): Forecast;
}
