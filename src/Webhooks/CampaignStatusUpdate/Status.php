<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CampaignStatusUpdate;

/**
 * The status of the campaign.
 */
enum Status: string
{
    case ACCEPTED = 'ACCEPTED';

    case REJECTED = 'REJECTED';

    case DORMANT = 'DORMANT';

    case SUCCESS = 'success';

    case FAILED = 'failed';
}
