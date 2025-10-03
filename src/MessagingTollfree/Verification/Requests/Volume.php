<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

/**
 * Message Volume Enums.
 */
enum Volume: string
{
    case _10 = '10';

    case _100 = '100';

    case _1_000 = '1,000';

    case _10_000 = '10,000';

    case _100_000 = '100,000';

    case _250_000 = '250,000';

    case _500_000 = '500,000';

    case _750_000 = '750,000';

    case _1_000_000 = '1,000,000';

    case _5_000_000 = '5,000,000';

    case _10_000_000 = '10,000,000+';
}
