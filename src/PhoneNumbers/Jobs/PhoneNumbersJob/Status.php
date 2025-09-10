<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob;

/**
 * Indicates the completion status of the background update.
 */
enum Status: string
{
    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';

    case EXPIRED = 'expired';
}
