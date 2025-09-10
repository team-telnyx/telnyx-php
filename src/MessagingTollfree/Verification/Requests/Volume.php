<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

/**
 * Message Volume Enums.
 */
enum Volume: string
{
    case VOLUME_10 = '10';

    case VOLUME_100 = '100';

    case VOLUME_1_000 = '1,000';

    case VOLUME_10_000 = '10,000';

    case VOLUME_100_000 = '100,000';

    case VOLUME_250_000 = '250,000';

    case VOLUME_500_000 = '500,000';

    case VOLUME_750_000 = '750,000';

    case VOLUME_1_000_000 = '1,000,000';

    case VOLUME_5_000_000 = '5,000,000';

    case VOLUME_10_000_000 = '10,000,000+';
}
