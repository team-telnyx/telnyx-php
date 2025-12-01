<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications\CallControlApplication;

/**
 * <code>Latency</code> directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
 */
enum AnchorsiteOverride: string
{
    case LATENCY = 'Latency';

    case CHICAGO_IL = 'Chicago, IL';

    case ASHBURN_VA = 'Ashburn, VA';

    case SAN_JOSE_CA = 'San Jose, CA';

    case LONDON_UK = 'London, UK';

    case CHENNAI_IN = 'Chennai, IN';

    case AMSTERDAM_NETHERLANDS = 'Amsterdam, Netherlands';

    case TORONTO_CANADA = 'Toronto, Canada';

    case SYDNEY_AUSTRALIA = 'Sydney, Australia';
}
