<?php

declare(strict_types=1);

namespace Telnyx\SipRegistrationStatus\SipRegistrationStatusGetResponse;

/**
 * Human-readable registration status derived from the registrar state.
 */
enum SipRegistrationStatus: string
{
    case UNREGISTERING = 'unregistering';

    case CONNECTION_DISABLED = 'connection_disabled';

    case STANDBY = 'standby';

    case FAILED = 'failed';

    case TRYING = 'trying';

    case REGISTERED = 'registered';

    case UNKNOWN = 'unknown';
}
