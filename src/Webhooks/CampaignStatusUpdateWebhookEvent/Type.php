<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent;

enum Type: string
{
    case TELNYX_EVENT = 'TELNYX_EVENT';

    case REGISTRATION = 'REGISTRATION';

    case MNO_REVIEW = 'MNO_REVIEW';

    case TELNYX_REVIEW = 'TELNYX_REVIEW';

    case NUMBER_POOL_PROVISIONED = 'NUMBER_POOL_PROVISIONED';

    case NUMBER_POOL_DEPROVISIONED = 'NUMBER_POOL_DEPROVISIONED';

    case TCR_EVENT = 'TCR_EVENT';

    case VERIFIED = 'VERIFIED';
}
