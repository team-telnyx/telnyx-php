<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs\RcsCapabilities;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case RCS_CAPABILITIES = 'rcs.capabilities';
}
