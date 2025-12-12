<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Brand\TelnyxBrand;

/**
 * Brand relationship to the CSP.
 */
enum BrandRelationship: string
{
    case BASIC_ACCOUNT = 'BASIC_ACCOUNT';

    case SMALL_ACCOUNT = 'SMALL_ACCOUNT';

    case MEDIUM_ACCOUNT = 'MEDIUM_ACCOUNT';

    case LARGE_ACCOUNT = 'LARGE_ACCOUNT';

    case KEY_ACCOUNT = 'KEY_ACCOUNT';
}
