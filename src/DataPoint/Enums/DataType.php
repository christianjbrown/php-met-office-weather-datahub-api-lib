<?php

declare(strict_types=1);

namespace ChristianBrown\MetOffice\DataPoint\Enums;

enum DataType: string
{
    case IMAGERY = 'image';
    case MAP_OVERLAY = 'layer';
    case TEXT = 'txt';
    case VALUES = 'val';
}
