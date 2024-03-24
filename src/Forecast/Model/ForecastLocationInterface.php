<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

interface ForecastLocationInterface
{
    public function getContinent(): string;

    public function getCountry(): string;

    public function getElevation(): float;

    public function getId(): int;

    public function getLatitude(): float;

    public function getLongitude(): float;

    public function getName(): string;

    public function getPeriods(): array;
}
