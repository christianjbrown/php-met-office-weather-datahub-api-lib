<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

final class ForecastLocation
{
    public readonly string $continent;
    public readonly string $country;
    public readonly float $elevation;
    public readonly int $id;
    public readonly float $latitude;
    public readonly float $longitude;
    public readonly string $name;
    public readonly array $periods;

    public function __construct(int $id, string $continent, string $country, float $elevation, float $latitude, float $longitude, string $name, array $periods)
    {
        $this->id = $id;
        $this->continent = $continent;
        $this->country = $country;
        $this->elevation = $elevation;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->name = $name;
        $this->periods = $periods;
    }
}
