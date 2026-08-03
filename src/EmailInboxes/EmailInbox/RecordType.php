<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\EmailInbox;

enum RecordType: string
{
    case EMAIL_INBOX = 'email_inbox';
}
