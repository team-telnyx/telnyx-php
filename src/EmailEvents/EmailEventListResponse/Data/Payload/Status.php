<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventListResponse\Data\Payload;

/**
 * Stored event outcome slug, not the authoritative recipient status. Account polling returns the stored name, including suppression, scan, and quarantine lifecycle names. Webhooks retain legacy payload names: gateway rejections use failed and MTA expirations use bounced. New sharp stored rows can expose gw_reject, injection_timeout, or expired. Use the envelope canonical_event_type to identify the outcome across surfaces.
 */
enum Status: string
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
