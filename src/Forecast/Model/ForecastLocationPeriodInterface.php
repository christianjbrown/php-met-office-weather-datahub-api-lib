<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

interface ForecastLocationPeriodInterface
{
    public function getRepresentations(): array;

    public function getType(): string;

    public function getValue(): string;
}
