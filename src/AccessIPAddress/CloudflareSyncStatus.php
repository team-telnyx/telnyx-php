<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress;

/**
 * An enumeration.
 */
enum CloudflareSyncStatus: string
{
    case PENDING = 'pending';

    case ADDED = 'added';
}
