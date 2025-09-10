<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotification\Threshold;

enum Unit: string
{
    case MB = 'MB';

    case GB = 'GB';
}
