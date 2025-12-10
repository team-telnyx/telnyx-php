<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Campaign\CampaignListResponse;

/**
 * Campaign submission status.
 */
enum SubmissionStatus: string
{
    case CREATED = 'CREATED';

    case FAILED = 'FAILED';

    case PENDING = 'PENDING';
}
