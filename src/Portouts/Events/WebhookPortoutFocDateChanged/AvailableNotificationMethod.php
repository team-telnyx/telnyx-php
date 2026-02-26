<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\WebhookPortoutFocDateChanged;

enum AvailableNotificationMethod: string
{
    case EMAIL = 'email';

    case WEBHOOK = 'webhook';
}
