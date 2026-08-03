<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Threads\InboundThread;

enum RecordType: string
{
    case EMAIL_THREAD = 'email_thread';
}
