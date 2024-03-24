<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\RepresentationTimePeriod;

interface ForecastLocationDayPeriodRepresentationInterface extends ForecastLocationPeriodRepresentationInterface
{
    public function getTimePeriod(): RepresentationTimePeriod;
}
