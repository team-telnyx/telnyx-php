<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumber;

/**
 * The noise suppression setting.
 */
enum NoiseSuppression: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';

    case BOTH = 'both';

    case DISABLED = 'disabled';
}
