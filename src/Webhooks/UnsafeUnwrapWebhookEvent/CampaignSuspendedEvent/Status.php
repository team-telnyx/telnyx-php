<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\UnsafeUnwrapWebhookEvent\CampaignSuspendedEvent;

/**
 * The status of the campaign.
 */
enum Status: string
{
    case DORMANT = 'DORMANT';
}
