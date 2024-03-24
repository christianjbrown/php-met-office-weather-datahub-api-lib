<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

interface ForecastLocationShortPeriodRepresentationInterface extends ForecastLocationPeriodRepresentationInterface
{
    public function getTimePeriod(): int;
}
