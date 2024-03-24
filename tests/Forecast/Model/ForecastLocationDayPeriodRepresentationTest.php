<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Tests\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\RepresentationTimePeriod;
use ChristianBrown\MetOffice\DataPoint\Enums\Visibility;
use ChristianBrown\MetOffice\DataPoint\Enums\WeatherType;
use ChristianBrown\MetOffice\DataPoint\Enums\WindDirection;
use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocationDayPeriodRepresentation;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ForecastLocationDayPeriodRepresentation::class)]
final class ForecastLocationDayPeriodRepresentationTest extends TestCase
{
    public function test(): void
    {
        $representation = new ForecastLocationDayPeriodRepresentation(1, 2, RepresentationTimePeriod::NIGHT, 4, 5, 6, Visibility::GOOD, WeatherType::CLEAR_NIGHT, WindDirection::NORTH, 7, 8);
        self::assertSame(1, $representation->getFeelsLike());
        self::assertSame(2, $representation->getMaxUvIndex());
        self::assertSame(RepresentationTimePeriod::NIGHT, $representation->getTimePeriod());
        self::assertSame(4, $representation->getPrecipitationProbability());
        self::assertSame(5, $representation->getScreenRelativeHumidity());
        self::assertSame(6, $representation->getTemperature());
        self::assertSame(Visibility::GOOD, $representation->getVisibility());
        self::assertSame(WeatherType::CLEAR_NIGHT, $representation->getWeatherType());
        self::assertSame(WindDirection::NORTH, $representation->getWindDirection());
        self::assertSame(7, $representation->getWindGust());
        self::assertSame(8, $representation->getWindSpeed());
    }
}
