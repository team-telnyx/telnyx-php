<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxQueued\Data\Payload;

/**
 * The direction of the fax.
 */
enum Direction: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';
}
