<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\Visibility;
use ChristianBrown\MetOffice\DataPoint\Enums\WeatherType;
use ChristianBrown\MetOffice\DataPoint\Enums\WindDirection;

final class ForecastLocationShortPeriodRepresentation extends AbstractForecastLocationPeriodRepresentation implements ForecastLocationShortPeriodRepresentationInterface
{
    private int $timePeriod;

    public function __construct(int $feelsLike, int $maxUvIndex, int $timePeriod, int $precipitationProbability, int $screenRelativeHumidity, int $temperature, Visibility $visibility, WeatherType $weatherType, WindDirection $windDirection, int $windGust, int $windSpeed)
    {
        parent::__construct($feelsLike, $maxUvIndex, $precipitationProbability, $screenRelativeHumidity, $temperature, $visibility, $weatherType, $windDirection, $windGust, $windSpeed);
        $this->timePeriod = $timePeriod;
    }

    public function getTimePeriod(): int
    {
        return $this->timePeriod;
    }
}
