<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\PortingEventStatusChangedEvent;

enum AvailableNotificationMethod: string
{
    case EMAIL = 'email';

    case WEBHOOK = 'webhook';

    case WEBHOOK_V1 = 'webhook_v1';
}
