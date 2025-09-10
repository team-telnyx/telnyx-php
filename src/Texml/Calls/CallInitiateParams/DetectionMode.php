<?php

declare(strict_types=1);

namespace Telnyx\Texml\Calls\CallInitiateParams;

/**
 * Allows you to chose between Premium and Standard detections.
 */
enum DetectionMode: string
{
    case PREMIUM = 'Premium';

    case REGULAR = 'Regular';
}
