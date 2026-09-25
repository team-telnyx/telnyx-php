<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailWebhookRecipient;

enum Kind: string
{
    case TO = 'to';

    case CC = 'cc';

    case BCC = 'bcc';
}
