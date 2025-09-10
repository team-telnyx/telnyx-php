<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocServiceDocument;

/**
 * Indicates the current document reviewing status.
 */
enum Status: string
{
    case PENDING = 'pending';

    case VERIFIED = 'verified';

    case DENIED = 'denied';
}
