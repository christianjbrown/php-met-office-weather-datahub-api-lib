<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\Visibility;
use ChristianBrown\MetOffice\DataPoint\Enums\WeatherType;
use ChristianBrown\MetOffice\DataPoint\Enums\WindDirection;

abstract class AbstractForecastLocationPeriodRepresentation implements ForecastLocationPeriodRepresentationInterface
{
    private int $feelsLike;
    private int $maxUvIndex;
    private int $precipitationProbability;
    private int $screenRelativeHumidity;
    private int $temperature;
    private Visibility $visibility;
    private WeatherType $weatherType;
    private WindDirection $windDirection;
    private int $windGust;
    private int $windSpeed;

    public function __construct(int $feelsLike, int $maxUvIndex, int $precipitationProbability, int $screenRelativeHumidity, int $temperature, Visibility $visibility, WeatherType $weatherType, WindDirection $windDirection, int $windGust, int $windSpeed)
    {
        $this->feelsLike = $feelsLike;
        $this->maxUvIndex = $maxUvIndex;
        $this->precipitationProbability = $precipitationProbability;
        $this->screenRelativeHumidity = $screenRelativeHumidity;
        $this->temperature = $temperature;
        $this->visibility = $visibility;
        $this->weatherType = $weatherType;
        $this->windDirection = $windDirection;
        $this->windGust = $windGust;
        $this->windSpeed = $windSpeed;
    }

    final public function getFeelsLike(): int
    {
        return $this->feelsLike;
    }

    final public function getMaxUvIndex(): int
    {
        return $this->maxUvIndex;
    }

    final public function getPrecipitationProbability(): int
    {
        return $this->precipitationProbability;
    }

    final public function getScreenRelativeHumidity(): int
    {
        return $this->screenRelativeHumidity;
    }

    final public function getTemperature(): int
    {
        return $this->temperature;
    }

    final public function getVisibility(): Visibility
    {
        return $this->visibility;
    }

    final public function getWeatherType(): WeatherType
    {
        return $this->weatherType;
    }

    final public function getWindDirection(): WindDirection
    {
        return $this->windDirection;
    }

    final public function getWindGust(): int
    {
        return $this->windGust;
    }

    final public function getWindSpeed(): int
    {
        return $this->windSpeed;
    }
}
