<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

/**
 * Tollfree verification status.
 */
enum TfVerificationStatus: string
{
    case VERIFIED = 'Verified';

    case REJECTED = 'Rejected';

    case WAITING_FOR_VENDOR = 'Waiting For Vendor';

    case WAITING_FOR_CUSTOMER = 'Waiting For Customer';

    case WAITING_FOR_TELNYX = 'Waiting For Telnyx';

    case IN_PROGRESS = 'In Progress';
}
