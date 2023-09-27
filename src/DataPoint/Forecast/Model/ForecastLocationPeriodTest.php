<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Model;

use PHPUnit\Framework\TestCase;

/**
 * @covers \ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocationPeriod
 *
 * @codeCoverageIgnore
 *
 * @internal
 *
 * @small
 */
final class ForecastLocationPeriodTest extends TestCase
{
    public function testConstructor(): void
    {
        $type = 'test-type';
        $value = 'test-value';
        $representations = ['test-value-1', 'test-value-2'];

        $forecastLocationPeriod = new ForecastLocationPeriod($type, $value, $representations);

        self::assertSame($type, $forecastLocationPeriod->type);
        self::assertSame($value, $forecastLocationPeriod->value);
        self::assertSame($representations, $forecastLocationPeriod->representations);
    }
}
