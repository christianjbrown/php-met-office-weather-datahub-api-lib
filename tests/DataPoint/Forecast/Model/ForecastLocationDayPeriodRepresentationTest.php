<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\Tests\DataPoint\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\RepresentationTimePeriod;
use ChristianBrown\MetOffice\DataPoint\Enums\Visibility;
use ChristianBrown\MetOffice\DataPoint\Enums\WeatherType;
use ChristianBrown\MetOffice\DataPoint\Enums\WindDirection;
use ChristianBrown\MetOffice\DataPoint\Forecast\Model\AbstractForecastLocationPeriodRepresentation;
use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocationDayPeriodRepresentation;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(AbstractForecastLocationPeriodRepresentation::class)]
#[CoversClass(ForecastLocationDayPeriodRepresentation::class)]
final class ForecastLocationDayPeriodRepresentationTest extends TestCase
{
    public function testConstructor(): void
    {
        $feelsLike = 20;
        $maxUvIndex = 5;
        $timePeriod = RepresentationTimePeriod::NIGHT;
        $precipitationProbability = 30;
        $screenRelativeHumidity = 70;
        $temperature = 25;
        $visibility = Visibility::GOOD;
        $weatherType = WeatherType::SUNNY_DAY;
        $windDirection = WindDirection::NORTH;
        $windGust = 15;
        $windSpeed = 10;

        $forecast = new ForecastLocationDayPeriodRepresentation($feelsLike, $maxUvIndex, $timePeriod, $precipitationProbability, $screenRelativeHumidity, $temperature, $visibility, $weatherType, $windDirection, $windGust, $windSpeed);

        self::assertSame($feelsLike, $forecast->feelsLike);
        self::assertSame($maxUvIndex, $forecast->maxUvIndex);
        self::assertSame($timePeriod, $forecast->timePeriod);
        self::assertSame($precipitationProbability, $forecast->precipitationProbability);
        self::assertSame($screenRelativeHumidity, $forecast->screenRelativeHumidity);
        self::assertSame($temperature, $forecast->temperature);
        self::assertSame($visibility, $forecast->visibility);
        self::assertSame($weatherType, $forecast->weatherType);
        self::assertSame($windDirection, $forecast->windDirection);
        self::assertSame($windGust, $forecast->windGust);
        self::assertSame($windSpeed, $forecast->windSpeed);
    }
}
