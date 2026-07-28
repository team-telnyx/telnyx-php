<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainGetHealthResponse\Data;

/**
 * Record type discriminator.
 */
enum RecordType: string
{
    case EMAIL_DOMAIN_HEALTH = 'email_domain_health';
}
