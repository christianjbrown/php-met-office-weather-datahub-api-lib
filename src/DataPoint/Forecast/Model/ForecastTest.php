<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\DvType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \ChristianBrown\MetOffice\DataPoint\Forecast\Model\Forecast
 *
 * @uses \ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocation
 * @uses \ChristianBrown\MetOffice\DataPoint\Enums\DvType
 *
 * @codeCoverageIgnore
 *
 * @internal
 *
 * @small
 */
final class ForecastTest extends TestCase
{
    public function testConstructor(): void
    {
        $dataDate = '2023-09-27';
        $type = DvType::FORECAST;
        $location = new ForecastLocation(1, 'test-continent', 'test-country', 2.0, 3.0, 4.0, 'test-name', []);
        $forecast = new Forecast($dataDate, $type, $location);
        self::assertSame($dataDate, $forecast->dataDate);
        self::assertSame($type, $forecast->type);
        self::assertSame($location, $forecast->location);
    }
}
