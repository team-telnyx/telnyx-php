<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\EmailBlockGetEventsResponse\Data;

enum EventType: string
{
    case CREATED = 'created';

    case REMOVED = 'removed';

    case EXPIRED = 'expired';

    case OVERRIDE_USED = 'override_used';
}
