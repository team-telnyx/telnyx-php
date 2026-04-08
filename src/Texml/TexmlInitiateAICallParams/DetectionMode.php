<?php

declare(strict_types=1);

namespace Telnyx\Texml\TexmlInitiateAICallParams;

/**
 * Allows you to choose between Premium and Standard detections.
 */
enum DetectionMode: string
{
    case PREMIUM = 'Premium';

    case REGULAR = 'Regular';
}
