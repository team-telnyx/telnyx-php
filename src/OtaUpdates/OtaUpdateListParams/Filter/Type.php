<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates\OtaUpdateListParams\Filter;

/**
 * Filter by type.
 */
enum Type: string
{
    case SIM_CARD_NETWORK_PREFERENCES = 'sim_card_network_preferences';
}
