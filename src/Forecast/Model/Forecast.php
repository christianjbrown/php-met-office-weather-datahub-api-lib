<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\DvType;

final class Forecast implements ForecastInterface
{
    private string $dataDate;
    private ForecastLocationInterface $location;
    private DvType $type;

    public function __construct(string $dataDate, DvType $type, ForecastLocationInterface $location)
    {
        $this->dataDate = $dataDate;
        $this->type = $type;
        $this->location = $location;
    }

    public function getDataDate(): string
    {
        return $this->dataDate;
    }

    public function getLocation(): ForecastLocationInterface
    {
        return $this->location;
    }

    public function getType(): DvType
    {
        return $this->type;
    }
}
