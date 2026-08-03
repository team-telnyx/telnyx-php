<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Threads\ThreadMessage;

enum Direction: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';
}
