<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventListResponse\Payload\WebhookPortoutStatusChangedPayload;

/**
 * The new status of the port out.
 */
enum Status: string
{
    case PENDING = 'pending';

    case AUTHORIZED = 'authorized';

    case PORTED = 'ported';

    case REJECTED = 'rejected';

    case REJECTED_PENDING = 'rejected-pending';

    case CANCELED = 'canceled';
}
