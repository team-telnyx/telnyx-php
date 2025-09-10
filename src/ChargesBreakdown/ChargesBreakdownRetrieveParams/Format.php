<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams;

/**
 * Response format.
 */
enum Format: string
{
    case JSON = 'json';

    case CSV = 'csv';
}
