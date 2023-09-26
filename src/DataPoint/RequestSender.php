<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint;

use ChristianBrown\JsonApiClient\RequestSender as JsonRequestSender;
use ChristianBrown\MetOffice\DataPoint\Enums\ApiType;
use ChristianBrown\MetOffice\DataPoint\Enums\DataType;
use ChristianBrown\MetOffice\DataPoint\Enums\FormatType;
use ChristianBrown\MetOffice\DataPoint\Enums\LocationType;
use ChristianBrown\MetOffice\DataPoint\Enums\ResolutionType;

use function gmdate;

final class RequestSender implements RequestSenderInterface
{
    private string $apiKey;
    private JsonRequestSender $jsonRequestSender;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $badResponseTransformer = new BadResponseTransformer();
        $this->jsonRequestSender = new JsonRequestSender($badResponseTransformer);
    }

    public function get(DataType $dataType, ApiType $apiType, LocationType $locationType, ?int $locationId = null, ?ResolutionType $resolutionType = null, ?int $time = null): array
    {
        $location = $locationId ? (string) $locationId : self::URL_LOCATION_ALL;
        $url = sprintf(self::URL_SPRINTF, $dataType->value, $apiType->value, $locationType->value, FormatType::JSON->value, $location);
        $queryStrings = [
            self::QUERY_KEY_KEY => $this->apiKey,
        ];
        if ($resolutionType instanceof ResolutionType) {
            $queryStrings[self::QUERY_KEY_RESOLUTION] = $resolutionType->value;
        }
        if (null !== $time) {
            if (ResolutionType::DAILY === $resolutionType) {
                $queryStrings[self::QUERY_KEY_TIME] = gmdate(self::DATE_FORMAT, $time);
            } elseif (ResolutionType::THREE_HOURLY === $resolutionType) {
                $queryStrings[self::QUERY_KEY_TIME] = gmdate(self::DATE_TIME_FORMAT, $time);
            }
        }
        $data = $this->jsonRequestSender->get(self::FRIENDLY_NAME, $url, $queryStrings);

        return $data;
    }
}
