<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Campaign\TelnyxCampaignCsp;

/**
 * Campaign submission status.
 */
enum SubmissionStatus: string
{
    case CREATED = 'CREATED';

    case FAILED = 'FAILED';

    case PENDING = 'PENDING';
}
