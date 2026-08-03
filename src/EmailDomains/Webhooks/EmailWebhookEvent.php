<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\Webhooks;

/**
 * Event types a webhook may subscribe to. The union of email.* events (published by email-api) and email_domain.* lifecycle events (published by this service). An event not listed here can never be subscribed to and is silently dropped.
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

    case EMAIL_DOMAIN_CREATED = 'email_domain.created';

    case EMAIL_DOMAIN_VERIFIED = 'email_domain.verified';

    case EMAIL_DOMAIN_DEGRADED = 'email_domain.degraded';

    case EMAIL_DOMAIN_SUSPENDED = 'email_domain.suspended';

    case EMAIL_DOMAIN_DELETED = 'email_domain.deleted';
}
