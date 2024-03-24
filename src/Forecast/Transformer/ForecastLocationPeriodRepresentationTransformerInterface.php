<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Transformer;

use ChristianBrown\MetOffice\DataPoint\Forecast\Model\AbstractForecastLocationPeriodRepresentation;

interface ForecastLocationPeriodRepresentationTransformerInterface
{
    public const DATA_KEY_FEELS_LIKE = 'F';
    public const DATA_KEY_MAX_UV_INDEX = 'U';
    public const DATA_KEY_PRECIPITATION_PROBABILITY = 'Pp';
    public const DATA_KEY_SCREEN_RELATIVE_HUMIDITY = 'H';
    public const DATA_KEY_TEMPERATURE = 'T';
    public const DATA_KEY_TIME_PERIOD = '$';
    public const DATA_KEY_VISIBILITY = 'V';
    public const DATA_KEY_WEATHER_TYPE = 'W';
    public const DATA_KEY_WIND_DIRECTION = 'D';
    public const DATA_KEY_WIND_GUST = 'G';
    public const DATA_KEY_WIND_SPEED = 'S';

    public function transform(array $data): AbstractForecastLocationPeriodRepresentation;
}
