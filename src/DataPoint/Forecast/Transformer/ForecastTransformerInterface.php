<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Transformer;

use ChristianBrown\MetOffice\DataPoint\Forecast\Model\Forecast;

interface ForecastTransformerInterface
{
    public const DATA_KEY_SITE_REP = 'SiteRep';
    public const DATA_KEY_SITE_REP_DV = 'DV';
    public const DATA_KEY_SITE_REP_DV_DATA_DATE = 'dataDate';
    public const DATA_KEY_SITE_REP_DV_LOCATION = 'Location';
    public const DATA_KEY_SITE_REP_DV_TYPE = 'type';

    public function transform(array $data): Forecast;
}
