<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupRetrieveParams;

/**
 * Specifies the type of number lookup to be performed.
 */
enum Type: string
{
    case CARRIER = 'carrier';

    case CALLER_NAME = 'caller-name';
}
