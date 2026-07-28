<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts\EmailMessage;

enum RecordType: string
{
    case EMAIL_MESSAGE = 'email_message';
}
