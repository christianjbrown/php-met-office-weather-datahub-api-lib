<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Transformer;

use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocationPeriod;
use ChristianBrown\UserFriendlyException\UserFriendlyException;

use function is_array;
use function is_string;
use function sprintf;

final class ForecastLocationPeriodTransformer implements ForecastLocationPeriodTransformerInterface
{
    private string $friendlyName;
    private ForecastLocationPeriodRepresentationsTransformerInterface $representationsTransformer;

    public function __construct(string $friendlyName)
    {
        $this->friendlyName = $friendlyName;
        $this->representationsTransformer = new ForecastLocationPeriodRepresentationsTransformer($friendlyName);
    }

    public function transform(array $data): ForecastLocationPeriod
    {
        if (empty($data[self::DATA_KEY_TYPE]) || !is_string($data[self::DATA_KEY_TYPE])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_TYPE));
        }
        $type = $data[self::DATA_KEY_TYPE];
        if (empty($data[self::DATA_KEY_VALUE]) || !is_string($data[self::DATA_KEY_VALUE])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_VALUE));
        }
        $value = $data[self::DATA_KEY_VALUE];
        if (empty($data[self::DATA_KEY_RESOLUTIONS]) || !is_array($data[self::DATA_KEY_RESOLUTIONS])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_RESOLUTIONS));
        }
        $representations = $this->representationsTransformer->transform($data[self::DATA_KEY_RESOLUTIONS]);

        $period = new ForecastLocationPeriod($type, $value, $representations);

        return $period;
    }
}
