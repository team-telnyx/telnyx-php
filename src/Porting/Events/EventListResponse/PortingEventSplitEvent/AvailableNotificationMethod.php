<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\PortingEventSplitEvent;

enum AvailableNotificationMethod: string
{
    case EMAIL = 'email';

    case WEBHOOK = 'webhook';

    case WEBHOOK_V1 = 'webhook_v1';
}
