<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast;

use ChristianBrown\MetOffice\DataPoint\Forecast\Model\Forecast;

interface ThreeHourlySiteForecastApiInterface extends ForecastApiInterface
{
    public function get(int $locationId, string $time): Forecast;
}
