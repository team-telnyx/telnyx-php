<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\Recipients\EmailRecipient;

/**
 * Current per-recipient delivery status.
 */
enum Status: string
{
    case QUEUED = 'queued';

    case SENDING = 'sending';

    case SENT = 'sent';

    case DEFERRED = 'deferred';

    case DELIVERED = 'delivered';

    case BOUNCED = 'bounced';

    case FAILED = 'failed';

    case GW_REJECT = 'gw_reject';

    case CANCELLED = 'cancelled';
}
