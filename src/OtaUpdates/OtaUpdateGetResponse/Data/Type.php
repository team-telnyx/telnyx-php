<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates\OtaUpdateGetResponse\Data;

/**
 * Represents the type of the operation requested. This will relate directly to the source of the request.
 */
enum Type: string
{
    case SIM_CARD_NETWORK_PREFERENCES = 'sim_card_network_preferences';
}
