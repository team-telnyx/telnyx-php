<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents;

/**
 * Bare stored event names returned by message history. In addition to the normal send and delivery lifecycle, polling can expose suppression, scan, and quarantine lifecycle rows. Sharp canonical names gw_reject, injection_timeout, and expired distinguish gateway rejection, ambiguous injection timeout, and MTA expiration. The failed and bounced names remain valid for system/admin failures and hard bounces respectively. Existing stored rows retain their original names.
 */
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

    case SUPPRESSED = 'suppressed';

    case REJECTED = 'rejected';

    case OPENED = 'opened';

    case CLICKED = 'clicked';

    case UNSUBSCRIBED = 'unsubscribed';

    case DAILY_LIMIT_EXCEEDED = 'daily_limit_exceeded';

    case SCAN_DEFERRED = 'scan_deferred';

    case QUARANTINED = 'quarantined';

    case QUARANTINE_RELEASED = 'quarantine_released';

    case QUARANTINE_RELEASE_DISPATCHED = 'quarantine_release_dispatched';

    case QUARANTINE_REJECTED = 'quarantine_rejected';

    case QUARANTINE_EXPIRED = 'quarantine_expired';

    case GW_REJECT = 'gw_reject';

    case INJECTION_TIMEOUT = 'injection_timeout';

    case EXPIRED = 'expired';
}
