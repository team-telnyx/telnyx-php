<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Brand;

/**
 * An enumeration.
 */
enum AltBusinessIDType: string
{
    case NONE = 'NONE';

    case DUNS = 'DUNS';

    case GIIN = 'GIIN';

    case LEI = 'LEI';
}
