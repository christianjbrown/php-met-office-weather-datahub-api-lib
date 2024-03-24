<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Tests\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocation;
use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocationPeriodInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ForecastLocation::class)]
final class ForecastLocationTest extends TestCase
{
    public function test(): void
    {
        $periods = [
            $this->createMock(ForecastLocationPeriodInterface::class),
            $this->createMock(ForecastLocationPeriodInterface::class),
        ];
        $location = new ForecastLocation(42, 'test-continent', 'test-country', 2.1, 3.2, 4.3, 'test-name', $periods);
        self::assertSame(42, $location->getId());
        self::assertSame('test-continent', $location->getContinent());
        self::assertSame('test-country', $location->getCountry());
        self::assertSame(2.1, $location->getElevation());
        self::assertSame(3.2, $location->getLatitude());
        self::assertSame(4.3, $location->getLongitude());
        self::assertSame('test-name', $location->getName());
        self::assertSame($periods, $location->getPeriods());
    }
}
