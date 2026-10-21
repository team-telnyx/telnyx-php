<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupRetrieveParams;

/**
 * Specifies the type of number lookup to be performed. May be supplied more than once to request several data sources in a single call (for example, `?type=carrier&type=enhanced-caller-name`). Each requested type populates the corresponding object in the response.
 */
enum Type: string
{
    case CARRIER = 'carrier';

    case CALLER_NAME = 'caller-name';

    case CALLER_IDENTITY = 'caller-identity';

    case ENHANCED_CALLER_NAME = 'enhanced-caller-name';
}
