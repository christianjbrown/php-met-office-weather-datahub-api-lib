<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

final class ForecastLocation implements ForecastLocationInterface
{
    private string $continent;
    private string $country;
    private float $elevation;
    private int $id;
    private float $latitude;
    private float $longitude;
    private string $name;
    private array $periods;

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

    public function getContinent(): string
    {
        return $this->continent;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getElevation(): float
    {
        return $this->elevation;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPeriods(): array
    {
        return $this->periods;
    }
}
