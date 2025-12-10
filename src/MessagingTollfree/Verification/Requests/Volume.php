<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

/**
 * Message Volume Enums.
 */
enum Volume: string
{
    case V_10 = '10';

    case V_100 = '100';

    case V_1000 = '1,000';

    case V_10000 = '10,000';

    case V_100000 = '100,000';

    case V_250000 = '250,000';

    case V_500000 = '500,000';

    case V_750000 = '750,000';

    case V_1000000 = '1,000,000';

    case V_5000000 = '5,000,000';

    case V_10000000_PLUS = '10,000,000+';
}
