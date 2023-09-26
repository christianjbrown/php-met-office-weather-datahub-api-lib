<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Transformer;

final class ForecastLocationPeriodsTransformer implements ForecastLocationPeriodsTransformerInterface
{
    private ForecastLocationPeriodTransformerInterface $periodTransformer;

    public function __construct(string $friendlyName)
    {
        $this->periodTransformer = new ForecastLocationPeriodTransformer($friendlyName);
    }

    public function transform(array $data): array
    {
        $periods = [];
        foreach ($data as $periodData) {
            $periods[] = $this->periodTransformer->transform($periodData);
        }

        return $periods;
    }
}
