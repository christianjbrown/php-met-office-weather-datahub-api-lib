<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Transformer;

use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocation;
use ChristianBrown\UserFriendlyException\UserFriendlyException;

use function is_array;
use function is_numeric;
use function is_string;
use function sprintf;

final class ForecastLocationTransformer implements ForecastLocationTransformerInterface
{
    private string $friendlyName;
    private ForecastLocationPeriodsTransformerInterface $periodsTransformer;

    public function __construct(string $friendlyName)
    {
        $this->friendlyName = $friendlyName;
        $this->periodsTransformer = new ForecastLocationPeriodsTransformer($friendlyName);
    }

    public function transform(array $data): ForecastLocation
    {
        if (!isset($data[self::DATA_KEY_ID]) || !is_numeric($data[self::DATA_KEY_ID])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_ID));
        }
        $id = (int) $data[self::DATA_KEY_ID];
        if (!isset($data[self::DATA_KEY_LATITUDE]) || !is_numeric($data[self::DATA_KEY_LATITUDE])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_LATITUDE));
        }
        $latitude = (float) $data[self::DATA_KEY_LATITUDE];
        if (!isset($data[self::DATA_KEY_LONGITUDE]) || !is_numeric($data[self::DATA_KEY_LONGITUDE])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_LONGITUDE));
        }
        $longitude = (float) $data[self::DATA_KEY_LONGITUDE];
        if (empty($data[self::DATA_KEY_COUNTRY]) || !is_string($data[self::DATA_KEY_COUNTRY])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_COUNTRY));
        }
        $country = $data[self::DATA_KEY_COUNTRY];
        if (empty($data[self::DATA_KEY_CONTINENT]) || !is_string($data[self::DATA_KEY_CONTINENT])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_CONTINENT));
        }
        $continent = $data[self::DATA_KEY_CONTINENT];
        if (empty($data[self::DATA_KEY_NAME]) || !is_string($data[self::DATA_KEY_NAME])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_NAME));
        }
        $name = $data[self::DATA_KEY_NAME];
        if (!isset($data[self::DATA_KEY_ELEVATION]) || !is_numeric($data[self::DATA_KEY_ELEVATION])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_ELEVATION));
        }
        $elevation = (float) $data[self::DATA_KEY_ELEVATION];

        if (empty($data[self::DATA_KEY_PERIODS]) || !is_array($data[self::DATA_KEY_PERIODS])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_PERIODS));
        }
        $periods = $this->periodsTransformer->transform($data[self::DATA_KEY_PERIODS]);

        $location = new ForecastLocation($id, $continent, $country, $elevation, $latitude, $longitude, $name, $periods);

        return $location;
    }
}
