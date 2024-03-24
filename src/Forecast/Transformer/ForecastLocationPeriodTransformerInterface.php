<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Transformer;

use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocationPeriod;

interface ForecastLocationPeriodTransformerInterface
{
    public const DATA_KEY_REPRESENTATIONS = 'Rep';
    public const DATA_KEY_TYPE = 'type';
    public const DATA_KEY_VALUE = 'value';

    public function transform(array $data): ForecastLocationPeriod;
}
