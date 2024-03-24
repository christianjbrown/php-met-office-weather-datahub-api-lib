<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\Visibility;
use ChristianBrown\MetOffice\DataPoint\Enums\WeatherType;
use ChristianBrown\MetOffice\DataPoint\Enums\WindDirection;

interface ForecastLocationPeriodRepresentationInterface
{
    public function getFeelsLike(): int;

    public function getMaxUvIndex(): int;

    public function getPrecipitationProbability(): int;

    public function getScreenRelativeHumidity(): int;

    public function getTemperature(): int;

    public function getVisibility(): Visibility;

    public function getWeatherType(): WeatherType;

    public function getWindDirection(): WindDirection;

    public function getWindGust(): int;

    public function getWindSpeed(): int;
}
