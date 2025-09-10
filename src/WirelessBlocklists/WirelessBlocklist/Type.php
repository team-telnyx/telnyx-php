<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists\WirelessBlocklist;

/**
 * The type of the wireless blocklist.
 */
enum Type: string
{
    case COUNTRY = 'country';

    case MCC = 'mcc';

    case PLMN = 'plmn';
}
