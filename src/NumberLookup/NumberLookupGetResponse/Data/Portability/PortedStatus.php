<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability;

/**
 * Indicates whether or not the requested phone number has been ported.
 */
enum PortedStatus: string
{
    case Y = 'Y';

    case N = 'N';

    case PORTED_STATUS_ = '';
}
