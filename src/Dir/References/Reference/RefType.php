<?php

declare(strict_types=1);

namespace Telnyx\Dir\References\Reference;

/**
 * Whether this is a business reference or the financial reference.
 */
enum RefType: string
{
    case BUSINESS = 'business';

    case FINANCIAL = 'financial';
}
