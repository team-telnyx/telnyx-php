<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse\Data;

/**
 * The current registration status of your SIP connection.
 */
enum Status: string
{
    case NOT_APPLICABLE = 'Not Applicable';

    case NOT_REGISTERED = 'Not Registered';

    case FAILED = 'Failed';

    case EXPIRED = 'Expired';

    case REGISTERED = 'Registered';

    case UNREGISTERED = 'Unregistered';
}
