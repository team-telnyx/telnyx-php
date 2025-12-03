<?php

declare(strict_types=1);

namespace Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data;

/**
 * Activation status.
 */
enum ActivationStatus: string
{
    case NEW = 'New';

    case PENDING = 'Pending';

    case CONFLICT = 'Conflict';

    case CANCEL_PENDING = 'Cancel Pending';

    case FAILED = 'Failed';

    case CONCURRED = 'Concurred';

    case ACTIVATE_RDY = 'Activate RDY';

    case DISCONNECT_PENDING = 'Disconnect Pending';

    case CONCURRENCE_SENT = 'Concurrence Sent';

    case OLD = 'Old';

    case SENDING = 'Sending';

    case ACTIVE = 'Active';

    case CANCELLED = 'Cancelled';
}
