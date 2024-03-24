<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Transformer;

use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocation;

interface ForecastLocationTransformerInterface
{
    public const DATA_KEY_CONTINENT = 'continent';
    public const DATA_KEY_COUNTRY = 'country';
    public const DATA_KEY_ELEVATION = 'elevation';
    public const DATA_KEY_ID = 'i';
    public const DATA_KEY_LATITUDE = 'lat';
    public const DATA_KEY_LONGITUDE = 'lon';
    public const DATA_KEY_NAME = 'name';
    public const DATA_KEY_PERIODS = 'Period';

    public function transform(array $data): ForecastLocation;
}
