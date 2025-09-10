<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

/**
 * `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
 */
enum AnchorsiteOverride: string
{
    case LATENCY = 'Latency';

    case CHICAGO_IL = 'Chicago, IL';

    case ASHBURN_VA = 'Ashburn, VA';

    case SAN_JOSE_CA = 'San Jose, CA';

    case SYDNEY_AUSTRALIA = 'Sydney, Australia';

    case AMSTERDAM_NETHERLANDS = 'Amsterdam, Netherlands';

    case LONDON_UK = 'London, UK';

    case TORONTO_CANADA = 'Toronto, Canada';

    case VANCOUVER_CANADA = 'Vancouver, Canada';

    case FRANKFURT_GERMANY = 'Frankfurt, Germany';
}
