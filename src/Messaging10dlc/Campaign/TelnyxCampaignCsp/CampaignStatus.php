<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Campaign\TelnyxCampaignCsp;

/**
 * Campaign status.
 */
enum CampaignStatus: string
{
    case TCR_PENDING = 'TCR_PENDING';

    case TCR_SUSPENDED = 'TCR_SUSPENDED';

    case TCR_EXPIRED = 'TCR_EXPIRED';

    case TCR_ACCEPTED = 'TCR_ACCEPTED';

    case TCR_FAILED = 'TCR_FAILED';

    case TELNYX_ACCEPTED = 'TELNYX_ACCEPTED';

    case TELNYX_FAILED = 'TELNYX_FAILED';

    case MNO_PENDING = 'MNO_PENDING';

    case MNO_ACCEPTED = 'MNO_ACCEPTED';

    case MNO_REJECTED = 'MNO_REJECTED';

    case MNO_PROVISIONED = 'MNO_PROVISIONED';

    case MNO_PROVISIONING_FAILED = 'MNO_PROVISIONING_FAILED';
}
