<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\EmailInbox;

enum Status: string
{
    case ACTIVE = 'active';

    case PAUSED = 'paused';
}
