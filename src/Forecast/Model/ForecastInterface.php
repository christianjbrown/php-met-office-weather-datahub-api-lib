<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\DvType;

interface ForecastInterface
{
    public function getDataDate(): string;

    public function getLocation(): ForecastLocationInterface;

    public function getType(): DvType;
}
