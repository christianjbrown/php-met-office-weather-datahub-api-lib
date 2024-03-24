<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

final readonly class ForecastLocationPeriod implements ForecastLocationPeriodInterface
{
    private array $representations;
    private string $type;
    private string $value;

    public function __construct(string $type, string $value, array $representations)
    {
        $this->type = $type;
        $this->value = $value;
        $this->representations = $representations;
    }

    public function getRepresentations(): array
    {
        return $this->representations;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
