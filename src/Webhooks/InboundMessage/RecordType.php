<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessage;

enum RecordType: string
{
    case EMAIL_MESSAGE = 'email_message';
}
