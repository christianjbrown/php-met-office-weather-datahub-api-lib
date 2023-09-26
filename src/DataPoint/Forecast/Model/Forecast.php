<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\DvType;

final class Forecast
{
    public readonly int $dataDate;
    public readonly ForecastLocation $location;
    public readonly DvType $type;

    public function __construct(int $dataDate, DvType $type, ForecastLocation $location)
    {
        $this->dataDate = $dataDate;
        $this->type = $type;
        $this->location = $location;
    }
}
