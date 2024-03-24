<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Tests\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Enums\DvType;
use ChristianBrown\MetOffice\DataPoint\Forecast\Model\Forecast;
use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocationInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Forecast::class)]
final class ForecastTest extends TestCase
{
    public function test(): void
    {
        $location = $this->createMock(ForecastLocationInterface::class);
        $forecast = new Forecast('test-date', DvType::FORECAST, $location);
        self::assertSame('test-date', $forecast->getDataDate());
        self::assertSame(DvType::FORECAST, $forecast->getType());
        self::assertSame($location, $forecast->getLocation());
    }
}
