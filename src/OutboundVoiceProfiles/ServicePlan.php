<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

/**
 * Indicates the coverage of the termination regions.
 */
enum ServicePlan: string
{
    case GLOBAL = 'global';
}
