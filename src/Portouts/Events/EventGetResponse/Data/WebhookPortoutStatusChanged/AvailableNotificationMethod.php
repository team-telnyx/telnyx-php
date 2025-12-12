<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventGetResponse\Data\WebhookPortoutStatusChanged;

enum AvailableNotificationMethod: string
{
    case EMAIL = 'email';

    case WEBHOOK = 'webhook';
}
