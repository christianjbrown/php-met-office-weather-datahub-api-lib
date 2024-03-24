<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Tests\Forecast\Model;

use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocationPeriod;
use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocationPeriodRepresentationInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ForecastLocationPeriod::class)]
final class ForecastLocationPeriodTest extends TestCase
{
    public function test(): void
    {
        $representations = [
            $this->createMock(ForecastLocationPeriodRepresentationInterface::class),
            $this->createMock(ForecastLocationPeriodRepresentationInterface::class),
        ];
        $period = new ForecastLocationPeriod('test-type', 'test-value', $representations);
        self::assertSame('test-type', $period->getType());
        self::assertSame('test-value', $period->getValue());
        self::assertSame($representations, $period->getRepresentations());
    }
}
