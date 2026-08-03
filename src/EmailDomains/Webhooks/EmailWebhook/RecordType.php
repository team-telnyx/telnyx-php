<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\Webhooks\EmailWebhook;

enum RecordType: string
{
    case EMAIL_WEBHOOK = 'email_webhook';
}
