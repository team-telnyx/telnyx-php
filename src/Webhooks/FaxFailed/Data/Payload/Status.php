<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxFailed\Data\Payload;

/**
 * The status of the fax.
 */
enum Status: string
{
    case FAILED = 'failed';
}
