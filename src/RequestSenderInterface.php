<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint;

interface RequestSenderInterface
{
    public const DATE_FORMAT = 'Y-m-d\T';
    public const DATE_TIME_FORMAT = 'Y-m-d\TH\Z';
    public const QUERY_KEY_KEY = 'key';
    public const QUERY_KEY_RESOLUTION = 'res';
    public const QUERY_KEY_TIME = 'time';
    public const URL_LOCATION_ALL = 'all';
    public const URL_SPRINTF = 'http://datapoint.metoffice.gov.uk/public/data/%s/%s/%s/%s/%s';
}
