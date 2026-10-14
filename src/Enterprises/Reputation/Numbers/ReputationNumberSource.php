<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

/**
 * Where the phone number is hosted. `telnyx`: in your Telnyx inventory. `external`: a number you own that is hosted with another provider.
 */
enum ReputationNumberSource: string
{
    case TELNYX = 'telnyx';

    case EXTERNAL = 'external';
}
