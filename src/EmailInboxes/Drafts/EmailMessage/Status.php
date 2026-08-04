<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts\EmailMessage;

/**
 * Current status of an email message. Lifecycle statuses (queued, scheduled, etc.) are set on creation. Delivery statuses (delivered, bounced, etc.) are updated by delivery event consumers.
 */
enum Status: string
{
    case QUEUED = 'queued';

    case SCHEDULED = 'scheduled';

    case CANCELLED = 'cancelled';

    case SANDBOX = 'sandbox';

    case SENDING = 'sending';

    case SENT = 'sent';

    case FAILED = 'failed';

    case DEFERRED = 'deferred';

    case DELIVERED = 'delivered';

    case BOUNCED = 'bounced';

    case COMPLAINED = 'complained';

    case REJECTED = 'rejected';

    case OPENED = 'opened';

    case CLICKED = 'clicked';

    case UNSUBSCRIBED = 'unsubscribed';
}
