<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast;

use ChristianBrown\MetOffice\DataPoint\Enums\ApiType;
use ChristianBrown\MetOffice\DataPoint\Enums\DataType;
use ChristianBrown\MetOffice\DataPoint\Enums\LocationType;
use ChristianBrown\MetOffice\DataPoint\Enums\ResolutionType;
use ChristianBrown\MetOffice\DataPoint\Forecast\Model\Forecast;
use ChristianBrown\MetOffice\DataPoint\Forecast\Transformer\ForecastTransformer;
use ChristianBrown\MetOffice\DataPoint\Forecast\Transformer\ForecastTransformerInterface;
use ChristianBrown\MetOffice\DataPoint\RequestSender;

use function intdiv;
use function time;

final class ThreeHourlySiteForecastApi implements ThreeHourlySiteForecastApiInterface
{
    private ForecastTransformerInterface $forecastTransformer;
    private RequestSender $requestSender;

    public function __construct(string $apiKey)
    {
        $this->requestSender = new RequestSender($apiKey);
        $this->forecastTransformer = new ForecastTransformer(self::FRIENDLY_NAME);
    }

    public function get(int $locationId): Forecast
    {
        $data = $this->requestSender->get(DataType::VALUES, ApiType::FORECAST, LocationType::ALL, $locationId, ResolutionType::THREE_HOURLY);
        $forecast = $this->forecastTransformer->transform($data);

        return $forecast;
    }

    public function getOnePeriod(int $locationId, ?int $time = null): Forecast
    {
        $roundedTime = self::getRoundedToThreeHours($time);
        $data = $this->requestSender->get(DataType::VALUES, ApiType::FORECAST, LocationType::ALL, $locationId, ResolutionType::THREE_HOURLY, $roundedTime);
        $forecast = $this->forecastTransformer->transform($data);

        return $forecast;
    }

    private static function getRoundedToThreeHours(?int $time = null): int
    {
        if (null === $time) {
            $time = time();
        }
        $rounded = intdiv($time, self::SECS_PER_3_HOURS) * self::SECS_PER_3_HOURS;

        return $rounded;
    }
}
