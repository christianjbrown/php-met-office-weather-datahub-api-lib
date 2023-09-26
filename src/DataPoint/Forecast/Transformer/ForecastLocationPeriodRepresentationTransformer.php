<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Forecast\Transformer;

use ChristianBrown\MetOffice\DataPoint\Enums\Visibility;
use ChristianBrown\MetOffice\DataPoint\Enums\WeatherType;
use ChristianBrown\MetOffice\DataPoint\Enums\WindDirection;
use ChristianBrown\MetOffice\DataPoint\Forecast\Model\ForecastLocationPeriodRepresentation;
use ChristianBrown\UserFriendlyException\UserFriendlyException;

use function is_numeric;
use function is_string;
use function sprintf;

final class ForecastLocationPeriodRepresentationTransformer implements ForecastLocationPeriodRepresentationTransformerInterface
{
    private string $friendlyName;

    public function __construct(string $friendlyName)
    {
        $this->friendlyName = $friendlyName;
    }

    public function transform(array $data): ForecastLocationPeriodRepresentation
    {
        if (!isset($data[self::DATA_KEY_FEELS_LIKE]) || !is_numeric($data[self::DATA_KEY_FEELS_LIKE])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_FEELS_LIKE));
        }
        $feelsLike = (int) $data[self::DATA_KEY_FEELS_LIKE];

        if (!isset($data[self::DATA_KEY_MAX_UV_INDEX]) || !is_numeric($data[self::DATA_KEY_MAX_UV_INDEX])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_MAX_UV_INDEX));
        }
        $maxUvIndex = (int) $data[self::DATA_KEY_MAX_UV_INDEX];

        if (!isset($data[self::DATA_KEY_MINUTES_IN_TO_DAY]) || !is_numeric($data[self::DATA_KEY_MINUTES_IN_TO_DAY])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_MINUTES_IN_TO_DAY));
        }
        $minutesIntoDay = (int) $data[self::DATA_KEY_MINUTES_IN_TO_DAY];

        if (!isset($data[self::DATA_KEY_PRECIPITATION_PROBABILITY]) || !is_numeric($data[self::DATA_KEY_PRECIPITATION_PROBABILITY])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_PRECIPITATION_PROBABILITY));
        }
        $precipitationProbability = (int) $data[self::DATA_KEY_PRECIPITATION_PROBABILITY];

        if (!isset($data[self::DATA_KEY_SCREEN_RELATIVE_HUMIDITY]) || !is_numeric($data[self::DATA_KEY_SCREEN_RELATIVE_HUMIDITY])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_SCREEN_RELATIVE_HUMIDITY));
        }
        $screenRelativeHumidity = (int) $data[self::DATA_KEY_SCREEN_RELATIVE_HUMIDITY];

        if (!isset($data[self::DATA_KEY_TEMPERATURE]) || !is_numeric($data[self::DATA_KEY_TEMPERATURE])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_TEMPERATURE));
        }
        $temperature = (int) $data[self::DATA_KEY_TEMPERATURE];

        if (empty($data[self::DATA_KEY_VISIBILITY]) || !is_string($data[self::DATA_KEY_VISIBILITY]) || null === Visibility::tryFrom($data[self::DATA_KEY_VISIBILITY])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_VISIBILITY));
        }
        $visibility = Visibility::from($data[self::DATA_KEY_VISIBILITY]);

        if (!isset($data[self::DATA_KEY_WEATHER_TYPE]) || !is_numeric($data[self::DATA_KEY_WEATHER_TYPE]) || null === WeatherType::tryFrom((int) $data[self::DATA_KEY_WEATHER_TYPE])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_WEATHER_TYPE));
        }
        $weatherType = WeatherType::from((int) $data[self::DATA_KEY_WEATHER_TYPE]);

        if (empty($data[self::DATA_KEY_WIND_DIRECTION]) || !is_string($data[self::DATA_KEY_WIND_DIRECTION]) || null === WindDirection::tryFrom($data[self::DATA_KEY_WIND_DIRECTION])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_WIND_DIRECTION));
        }
        $windDirection = WindDirection::from($data[self::DATA_KEY_WIND_DIRECTION]);

        if (!isset($data[self::DATA_KEY_WIND_GUST]) || !is_numeric($data[self::DATA_KEY_WIND_GUST])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_WIND_GUST));
        }
        $windGust = (int) $data[self::DATA_KEY_WIND_GUST];

        if (!isset($data[self::DATA_KEY_WIND_SPEED]) || !is_numeric($data[self::DATA_KEY_WIND_SPEED])) {
            throw new UserFriendlyException(sprintf('Response from %s was not as expected, missing or corrupt "%s".', $this->friendlyName, self::DATA_KEY_WIND_SPEED));
        }
        $windSpeed = (int) $data[self::DATA_KEY_WIND_SPEED];

        $resolution = new ForecastLocationPeriodRepresentation($feelsLike, $maxUvIndex, $minutesIntoDay, $precipitationProbability, $screenRelativeHumidity, $temperature, $visibility, $weatherType, $windDirection, $windGust, $windSpeed);

        return $resolution;
    }
}
