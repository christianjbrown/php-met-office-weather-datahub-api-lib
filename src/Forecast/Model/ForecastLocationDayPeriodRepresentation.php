<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\RepresentationTimePeriod;
use ChristianBrown\MetOffice\DataPoint\Enums\Visibility;
use ChristianBrown\MetOffice\DataPoint\Enums\WeatherType;
use ChristianBrown\MetOffice\DataPoint\Enums\WindDirection;

final class ForecastLocationDayPeriodRepresentation extends AbstractForecastLocationPeriodRepresentation implements ForecastLocationDayPeriodRepresentationInterface
{
    private RepresentationTimePeriod $timePeriod;

    public function __construct(int $feelsLike, int $maxUvIndex, RepresentationTimePeriod $timePeriod, int $precipitationProbability, int $screenRelativeHumidity, int $temperature, Visibility $visibility, WeatherType $weatherType, WindDirection $windDirection, int $windGust, int $windSpeed)
    {
        parent::__construct($feelsLike, $maxUvIndex, $precipitationProbability, $screenRelativeHumidity, $temperature, $visibility, $weatherType, $windDirection, $windGust, $windSpeed);
        $this->timePeriod = $timePeriod;
    }

    public function getTimePeriod(): RepresentationTimePeriod
    {
        return $this->timePeriod;
    }
}
