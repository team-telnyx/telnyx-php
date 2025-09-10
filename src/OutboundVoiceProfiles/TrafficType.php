<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

/**
 * Specifies the type of traffic allowed in this profile.
 */
enum TrafficType: string
{
    case CONVERSATIONAL = 'conversational';
}
