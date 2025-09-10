<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

/**
 * Setting for how costs for outbound profile are calculated.
 */
enum UsagePaymentMethod: string
{
    case RATE_DECK = 'rate-deck';
}
