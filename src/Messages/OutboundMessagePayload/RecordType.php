<?php

declare(strict_types=1);

namespace Telnyx\Messages\OutboundMessagePayload;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case MESSAGE = 'message';
}
