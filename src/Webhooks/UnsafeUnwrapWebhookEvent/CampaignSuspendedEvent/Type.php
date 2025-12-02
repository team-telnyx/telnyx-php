<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\UnsafeUnwrapWebhookEvent\CampaignSuspendedEvent;

enum Type: string
{
    case TELNYX_EVENT = 'TELNYX_EVENT';
}
