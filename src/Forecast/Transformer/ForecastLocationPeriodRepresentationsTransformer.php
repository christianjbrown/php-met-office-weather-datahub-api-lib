<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Transformer;

final class ForecastLocationPeriodRepresentationsTransformer implements ForecastLocationPeriodRepresentationsTransformerInterface
{
    private ForecastLocationPeriodRepresentationTransformerInterface $resolutionTransformer;

    public function __construct(string $friendlyName)
    {
        $this->resolutionTransformer = new ForecastLocationPeriodRepresentationTransformer($friendlyName);
    }

    public function transform(array $data): array
    {
        $representations = [];
        foreach ($data as $resolutionData) {
            $representations[] = $this->resolutionTransformer->transform($resolutionData);
        }

        return $representations;
    }
}
