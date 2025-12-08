<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent;

/**
 * The status of the campaign.
 */
enum Status1: string
{
    case ACCEPTED = 'ACCEPTED';

    case REJECTED = 'REJECTED';

    case DORMANT = 'DORMANT';

    case SUCCESS = 'success';

    case FAILED = 'failed';
}
