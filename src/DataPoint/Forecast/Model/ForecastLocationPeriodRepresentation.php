<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\Visibility;
use ChristianBrown\MetOffice\DataPoint\Enums\WeatherType;
use ChristianBrown\MetOffice\DataPoint\Enums\WindDirection;

final class ForecastLocationPeriodRepresentation
{
    public readonly int $feelsLike;
    public readonly int $maxUvIndex;
    public readonly int $minutesIntoDay;
    public readonly int $precipitationProbability;
    public readonly int $screenRelativeHumidity;
    public readonly int $temperature;
    public readonly Visibility $visibility;
    public readonly WeatherType $weatherType;
    public readonly WindDirection $windDirection;
    public readonly int $windGust;
    public readonly int $windSpeed;

    public function __construct(int $feelsLike, int $maxUvIndex, int $minutesIntoDay, int $precipitationProbability, int $screenRelativeHumidity, int $temperature, Visibility $visibility, WeatherType $weatherType, WindDirection $windDirection, int $windGust, int $windSpeed)
    {
        $this->feelsLike = $feelsLike;
        $this->maxUvIndex = $maxUvIndex;
        $this->minutesIntoDay = $minutesIntoDay;
        $this->precipitationProbability = $precipitationProbability;
        $this->screenRelativeHumidity = $screenRelativeHumidity;
        $this->temperature = $temperature;
        $this->visibility = $visibility;
        $this->weatherType = $weatherType;
        $this->windDirection = $windDirection;
        $this->windGust = $windGust;
        $this->windSpeed = $windSpeed;
    }
}
