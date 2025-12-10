<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetResponse;

/**
 * An enumeration.
 */
enum Status: string
{
    case PENDING = 'pending';

    case PROCESSING = 'processing';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
