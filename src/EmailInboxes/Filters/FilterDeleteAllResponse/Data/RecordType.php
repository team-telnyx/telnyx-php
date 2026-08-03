<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Filters\FilterDeleteAllResponse\Data;

enum RecordType: string
{
    case EMAIL_INBOX_FILTERS = 'email_inbox_filters';
}
