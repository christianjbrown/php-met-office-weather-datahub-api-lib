<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

final class ForecastLocationPeriod
{
    public readonly array $representations;
    public readonly string $type;
    public readonly string $value;

    public function __construct(string $type, string $value, array $representations)
    {
        $this->type = $type;
        $this->value = $value;
        $this->representations = $representations;
    }
}
