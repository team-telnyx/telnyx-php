<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams\Threshold;

enum Unit: string
{
    case MB = 'MB';

    case GB = 'GB';
}
