<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingOutboundMessagePayload;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case MESSAGE = 'message';
}
