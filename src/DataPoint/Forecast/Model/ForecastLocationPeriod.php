<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

final readonly class ForecastLocationPeriod
{
    public array $representations;
    public string $type;
    public string $value;

    public function __construct(string $type, string $value, array $representations)
    {
        $this->type = $type;
        $this->value = $value;
        $this->representations = $representations;
    }
}
