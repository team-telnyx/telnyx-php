<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventGetStatsResponse\Data;

enum RecordType: string
{
    case EMAIL_EVENT_STATS = 'email_event_stats';
}
