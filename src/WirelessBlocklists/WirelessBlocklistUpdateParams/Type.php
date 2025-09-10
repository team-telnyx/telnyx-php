<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams;

/**
 * The type of wireless blocklist.
 */
enum Type: string
{
    case COUNTRY = 'country';

    case MCC = 'mcc';

    case PLMN = 'plmn';
}
