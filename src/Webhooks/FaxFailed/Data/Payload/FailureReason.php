<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxFailed\Data\Payload;

/**
 * Cause of the sending failure.
 */
enum FailureReason: string
{
    case REJECTED = 'rejected';
}
