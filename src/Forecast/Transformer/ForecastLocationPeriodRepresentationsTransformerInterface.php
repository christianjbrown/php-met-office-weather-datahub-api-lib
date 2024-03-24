<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Transformer;

interface ForecastLocationPeriodRepresentationsTransformerInterface
{
    public function transform(array $data): array;
}
