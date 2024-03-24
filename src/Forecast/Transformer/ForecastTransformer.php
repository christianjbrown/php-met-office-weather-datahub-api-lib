<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Transformer;

use ChristianBrown\MetOffice\DataPoint\Enums\DvType;
use ChristianBrown\MetOffice\DataPoint\Forecast\Model\Forecast;
use ChristianBrown\UserFriendlyException\UserFriendlyException;

use function is_array;
use function is_string;
use function sprintf;

final class ForecastTransformer implements ForecastTransformerInterface
{
    private string $friendlyName;
    private ForecastLocationTransformerInterface $locationTransformer;

    public function __construct(string $friendlyName)
    {
        $this->friendlyName = $friendlyName;
        $this->locationTransformer = new ForecastLocationTransformer($friendlyName);
    }

    public function transform(array $data): Forecast
    {
        if (empty($data[self::DATA_KEY_SITE_REP]) || !is_array($data[self::DATA_KEY_SITE_REP])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_SITE_REP));
        }
        $siteRep = $data[self::DATA_KEY_SITE_REP];

        if (empty($siteRep[self::DATA_KEY_SITE_REP_DV]) || !is_array($siteRep[self::DATA_KEY_SITE_REP_DV])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_SITE_REP_DV));
        }
        $dV = $siteRep[self::DATA_KEY_SITE_REP_DV];

        if (empty($dV[self::DATA_KEY_SITE_REP_DV_DATA_DATE]) || !is_string($dV[self::DATA_KEY_SITE_REP_DV_DATA_DATE])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_SITE_REP_DV_DATA_DATE));
        }
        $dataDate = $dV[self::DATA_KEY_SITE_REP_DV_DATA_DATE];

        if (empty($dV[self::DATA_KEY_SITE_REP_DV_TYPE]) || !is_string($dV[self::DATA_KEY_SITE_REP_DV_TYPE]) || null === DvType::tryFrom($dV[self::DATA_KEY_SITE_REP_DV_TYPE])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_SITE_REP_DV_TYPE));
        }
        $type = DvType::from($dV[self::DATA_KEY_SITE_REP_DV_TYPE]);

        if (empty($dV[self::DATA_KEY_SITE_REP_DV_LOCATION]) || !is_array($dV[self::DATA_KEY_SITE_REP_DV_LOCATION])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_SITE_REP_DV_LOCATION));
        }
        $location = $this->locationTransformer->transform($dV[self::DATA_KEY_SITE_REP_DV_LOCATION]);

        $forecast = new Forecast($dataDate, $type, $location);

        return $forecast;
    }
}
