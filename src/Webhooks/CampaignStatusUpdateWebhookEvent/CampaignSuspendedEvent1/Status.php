<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent\CampaignSuspendedEvent1;

/**
 * The status of the campaign.
 */
enum Status: string
{
    case DORMANT = 'DORMANT';
}
