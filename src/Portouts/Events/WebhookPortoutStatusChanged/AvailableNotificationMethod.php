<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\WebhookPortoutStatusChanged;

enum AvailableNotificationMethod: string
{
    case EMAIL = 'email';

    case WEBHOOK = 'webhook';
}
