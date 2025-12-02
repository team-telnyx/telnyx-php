<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent\CampaignSuspendedEvent;

/**
 * The status of the campaign.
 */
enum Status: string
{
    case DORMANT = 'DORMANT';
}
