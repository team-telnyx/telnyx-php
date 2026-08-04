<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents;

enum EmailEventType: string
{
    case QUEUED = 'queued';

    case DEFERRED = 'deferred';

    case SCHEDULED = 'scheduled';

    case CANCELLED = 'cancelled';

    case SANDBOX = 'sandbox';

    case SENDING = 'sending';

    case SENT = 'sent';

    case FAILED = 'failed';

    case DELIVERED = 'delivered';

    case BOUNCED = 'bounced';

    case COMPLAINED = 'complained';

    case REJECTED = 'rejected';

    case OPENED = 'opened';

    case CLICKED = 'clicked';

    case UNSUBSCRIBED = 'unsubscribed';

    case DAILY_LIMIT_EXCEEDED = 'daily_limit_exceeded';
}
