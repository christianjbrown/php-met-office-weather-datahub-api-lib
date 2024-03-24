<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Enums;

enum WindDirection: string
{
    case EAST = 'E';
    case EAST_NORTH_EAST = 'ENE';
    case EAST_SOUTH_EAST = 'ESE';
    case NORTH = 'N';
    case NORTH_EAST = 'NE';
    case NORTH_NORTH_EAST = 'NNE';
    case NORTH_NORTH_WEST = 'NNW';
    case NORTH_WEST = 'NW';
    case SOUTH = 'S';
    case SOUTH_EAST = 'SE';
    case SOUTH_SOUTH_EAST = 'SSE';
    case SOUTH_SOUTH_WEST = 'SSW';
    case SOUTH_WEST = 'SW';
    case WEST = 'W';
    case WEST_NORTH_WEST = 'WNW';
    case WEST_SOUTH_WEST = 'WSW';
}
