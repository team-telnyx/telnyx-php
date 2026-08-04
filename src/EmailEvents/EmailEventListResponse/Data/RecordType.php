<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventListResponse\Data;

enum RecordType: string
{
    case EMAIL_EVENT = 'email_event';
}
