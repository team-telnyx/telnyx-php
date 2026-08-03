<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Threads\Labels\LabelNewResponse\Data;

enum RecordType: string
{
    case EMAIL_THREAD = 'email_thread';
}
