<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams;

/**
 * Allows you to chose between Premium and Standard detections.
 */
enum DetectionMode: string
{
    case PREMIUM = 'Premium';

    case REGULAR = 'Regular';
}
