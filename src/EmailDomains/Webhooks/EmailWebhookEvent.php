<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\Webhooks;

/**
 * Event types accepted by domain webhook subscriptions. Allowlists match the legacy event_type, not canonical_event_type. Of the 22 accepted types, email.sending is stored but intentionally not published. Cancellation, daily-limit failures, and system failures publish after commit when a matching domain webhook is configured.
 */
enum EmailWebhookEvent: string
{
    case EMAIL_SCHEDULED = 'email.scheduled';

    case EMAIL_SANDBOX = 'email.sandbox';

    case EMAIL_QUEUED = 'email.queued';

    case EMAIL_SENDING = 'email.sending';

    case EMAIL_SENT = 'email.sent';

    case EMAIL_DELIVERED = 'email.delivered';

    case EMAIL_DEFERRED = 'email.deferred';

    case EMAIL_BOUNCED = 'email.bounced';

    case EMAIL_FAILED = 'email.failed';

    case EMAIL_COMPLAINED = 'email.complained';

    case EMAIL_OPENED = 'email.opened';

    case EMAIL_CLICKED = 'email.clicked';

    case EMAIL_UNSUBSCRIBED = 'email.unsubscribed';

    case EMAIL_RECEIVED = 'email.received';

    case EMAIL_CANCELLED = 'email.cancelled';

    case EMAIL_DAILY_LIMIT_EXCEEDED = 'email.daily_limit_exceeded';

    case EMAIL_DOMAIN_CREATED = 'email_domain.created';

    case EMAIL_DOMAIN_VERIFIED = 'email_domain.verified';

    case EMAIL_DOMAIN_DEGRADED = 'email_domain.degraded';

    case EMAIL_DOMAIN_SUSPENDED = 'email_domain.suspended';

    case EMAIL_DOMAIN_DELETED = 'email_domain.deleted';

    case EMAIL_DOMAIN_DKIM_ROTATED = 'email_domain.dkim_rotated';
}
