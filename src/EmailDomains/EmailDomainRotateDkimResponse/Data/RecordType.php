<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data;

enum RecordType: string
{
    case EMAIL_DOMAIN_DKIM_ROTATION = 'email_domain_dkim_rotation';
}
