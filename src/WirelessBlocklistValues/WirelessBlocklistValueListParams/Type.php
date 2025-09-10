<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams;

/**
 * The Wireless Blocklist type for which to list possible values (e.g., `country`, `mcc`, `plmn`).
 */
enum Type: string
{
    case COUNTRY = 'country';

    case MCC = 'mcc';

    case PLMN = 'plmn';
}
